<?php

namespace App\Http\Controllers\Pages\Player;

use App\Http\Controllers\Modules\Item;
use App\Http\Controllers\Modules\Message;
use App\Models\Account;
use App\Models\Coupon\Codes;
use App\Models\Coupon\History;
use App\Models\PItens;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Coupon extends Component
{
    public $code;

    protected $rules = ['code' => 'required|min:5|max:30|exists:coupon_codes,code'];

    protected $messages = [
        'code.required' => 'É necessário incluir um cupom no formulário',
        'code.min' => 'O cupom necessita ter no minimo 5 caracteres',
        'code.max' => 'O cupom só pode ter no máximo 30 caracteres',
        'code.exists' => 'Este cupom é inválido'
    ];

    public function couponProccess()
    {
        $validatedData = $this->validate();
        $coupon = Codes::where('code', $this->code)->first();
        $player = Account::find(Auth::user()->player_id);
        $couponHistory = History::where('player_id', Auth::user()->player_id)->where('code', $this->code)->count();
        $playerInventory = PItens::where('item_id', $coupon->item_id)->where('owner_id', $player->player_id)->first();
        if ($couponHistory > 0) {
            $this->dispatchBrowserEvent('newMessage', ["msg" => "Você já ativou esse este cupom.", "icon" => "error"]);
        } else {
            if ($coupon->limit > 0) {
                $coupon->limit = $coupon->limit - 1;
                $coupon->save();
                if ($coupon->type == 1) { //Gold
                    $player->increment('gp', $coupon->item_count);
                    $this->addHistoryLog($coupon, $player);
                    $this->dispatchBrowserEvent('newMessage', ["msg" => "Cupom ativado com sucesso! Você recebeu " . number_format($coupon->item_count) . " de gold.", "icon" => "success"]);
                    Message::sendMessageBoxPlayer([
                        'player' => $player->player_id,
                        'message' => 'Olá ' . $player->player_name . ' parabéns, você recebeu ' . number_format($coupon->item_count) . ' de gold, saldo total agora de gold é ('
                            . number_format($player->gp) . ').'
                    ]);
                    $this->code = null;
                } else if ($coupon->type == 2) { //Cash
                    $player->increment('money', $coupon->item_count);
                    $this->addHistoryLog($coupon, $player);
                    $this->dispatchBrowserEvent('newMessage', ["msg" => "Cupom ativado com sucesso! Você recebeu " . number_format($coupon->item_count) . " de cash.", "icon" => "success"]);
                    Message::sendMessageBoxPlayer([
                        'player' => $player->player_id,
                        'message' => 'Olá ' . $player->player_name . ' parabéns, você recebeu ' . number_format($coupon->item_count) . ' de cash, saldo total agora de cash é ('
                            . number_format($player->money) . ').'
                    ]);
                    $this->code = null;
                } else if ($coupon->type == 3) { //Coin
                    $player->increment('coin', $coupon->item_count);
                    $this->addHistoryLog($coupon, $player);
                    $this->dispatchBrowserEvent('newMessage', ["msg" => "Cupom ativado com sucesso! Você recebeu " . number_format($coupon->item_count) . " de coin.", "icon" => "success"]);
                    Message::sendMessageBoxPlayer([
                        'player' => $player->player_id,
                        'message' => 'Olá ' . $player->player_name . ' parabéns, você recebeu ' . number_format($coupon->item_count) . ' de coin, saldo total agora de coin é ('
                            . number_format($player->coin) . ').'
                    ]);
                    $this->code = null;
                } elseif ($coupon->type == 4) { //Item
                    if ($playerInventory) {
                        if ($playerInventory->equip == '1') {
                            $playerInventory->increment('count', $coupon->item_count); //Inserindo novo dia
                            $this->addHistoryLog($coupon, $player);
                            $this->dispatchBrowserEvent('newMessage', ["msg" => "Cupom ativado com sucesso! Você recebeu $coupon->item_name.", "icon" => "success"]);
                            Message::sendMessageBoxPlayer([
                                'player' => $player->player_id,
                                'message' => 'Olá ' . $player->player_name . ' parabéns você recebeu mais '
                                    . Item::countDayItem($playerInventory->count) . ' do item '
                                    . str_replace('_', ' ', $coupon->item_name) . '.'
                            ]);
                            $this->code = null;
                        } elseif ($playerInventory->equip == '2') {
                            $this->dispatchBrowserEvent('newMessage', ["msg" => "Atenção esse item já está abilitado em sua conta, tente outro cupom.", "icon" => "error"]);
                            $this->code = null;
                        } elseif ($playerInventory->equip == '3') {
                            $this->dispatchBrowserEvent('newMessage', ["msg" => "Atenção você possui esse item do cupom permanente em sua conta, tente outro cupom.", "icon" => "error"]);
                            $this->code = null;
                        }
                    } else {
                        PItens::insert([
                            'owner_id' => $player->player_id,
                            'item_id' => $coupon->item_id,
                            'item_name' => $coupon->item_name,
                            'count' => $coupon->item_count,
                            'category' => $coupon->item_category,
                            'equip' => 1
                        ]);
                        Message::sendMessageBoxPlayer([
                            'player' => $player->player_id,
                            'message' => 'Olá ' . $player->player_name . ' parabéns você recebeu um novo item em seu inventário '
                                . str_replace('_', ' ', $coupon->item_name) . ' por ' . Item::countDayItem($coupon->item_count) .
                                '.'
                        ]);
                        $this->addHistoryLog($coupon, $player);
                        $this->dispatchBrowserEvent('newMessage', ["msg" => "Cupom ativado com sucesso! Você recebeu $coupon->item_name.", "icon" => "success"]);
                        $this->code = null;
                    }
                }
            } else {
                $this->dispatchBrowserEvent('newMessage', ["msg" => "Este cupom já atingiu o limite de ativações!", "icon" => "error"]);
            }
        }
    }

    public function addHistoryLog($coupon, $player)
    {
        return  History::insert([
            'player_id' => $player->player_id,
            'code' => $coupon->code,
            'item_name' => $coupon->item_name,
            'item_count' => $coupon->item_count,
            'type' => $coupon->type,
            'created_at' => new Carbon('now')
        ]);
    }

    public function render()
    {
        return view('pages.player.coupon');
    }
}
