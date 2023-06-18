<?php

namespace App\Http\Controllers\Pages\Player;

use App\Http\Controllers\Modules\Item;
use App\Http\Controllers\Modules\Message;
use App\Models\Account;
use App\Models\Coupon\Codes;
use App\Models\Coupon\History;
use App\Models\PItens;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Coupon extends Component
{
    public $code;
    private $item;

    public function __construct()
    {
        $this->item = new Item();
    }

    public function couponProccess()
    {
        $validatedData = $this->validate();
        $coupon = Codes::where('code', $this->code)->first();
        $player = Account::find(Auth::user()->player_id);
        $couponHistory = History::where('player_id', Auth::user()->player_id)->where('code', $this->code)->count();
        $playerInventory = PItens::where('item_id', $coupon->item_id)->where('owner_id', $player->player_id)->first();
        if ($couponHistory > 0) {
            $this->dispatchBrowserEvent('newMessage', ["msg" => "Você já ativou esse este cupom.", "icon" => "error"]);
            return;
        }
        if ($coupon->limit <= 0) {
            $this->dispatchBrowserEvent('newMessage', ["msg" => "Este cupom já atingiu o limite de ativações!", "icon" => "error"]);
            return;
        }
        $coupon->limit = $coupon->limit - 1;
        $this->addHistoryLog($coupon, $player);
        $coupon->update();
        if ($coupon->type >= 1 && $coupon->type <= 3) {
            $attribute = ['1' => 'gp', '2' => 'money', '3' => 'coin'][$coupon->type];
            $player->increment($attribute, $coupon->item_count);
            $message = "Cupom ativado com sucesso! Você recebeu " . number_format($coupon->item_count) . " de " . $this->item->typeCouponName($coupon->type) . ".";
            Message::sendMessageBoxPlayer([
                'player' => $player->player_id,
                'message' => 'Olá ' . $player->player_name . ' parabéns, você recebeu ' . number_format($coupon->item_count) . ' de ' . $this->item->typeCouponName($coupon->type) . '.'
            ]);
        } elseif ($coupon->type == 4) {
            if (!$playerInventory) {
                PItens::insert([
                    'owner_id' => $player->player_id,
                    'item_id' => $coupon->item_id,
                    'item_name' => $this->item->renameItem($coupon->item_name) . " (COUPON)",
                    'count' => $coupon->item_count,
                    'category' => $coupon->item_category,
                    'equip' => 1
                ]);
                $message = "Cupom ativado com sucesso! Você recebeu " .  $this->item->renameItem($coupon->item_name) . ".";
                Message::sendMessageBoxPlayer([
                    'player' => $player->player_id,
                    'message' => 'Olá ' . $player->player_name . ' parabéns você recebeu um novo item em seu inventário ' .  $this->item->renameItem($coupon->item_name) . ' por ' .  $this->item->countDayItem($coupon->item_count) . '.'
                ]);
            } elseif ($playerInventory->equip <= 2) {
                $playerInventory->increment('count', $coupon->item_count);
                #$playerInventory->update(['count' => $this->item->addMoreSeconds($playerInventory->count, $coupon->item_count)]);
                $message = "Cupom ativado com sucesso! Você recebeu " . $this->item->renameItem($coupon->item_name) . ".";
                Message::sendMessageBoxPlayer([
                    'player' => $player->player_id,
                    'message' => 'Olá ' . $player->player_name . ' parabéns você recebeu mais ' .  $this->item->countDayItem($playerInventory->count) . ' do item ' . $this->item->renameItem($coupon->item_name) . '.'
                ]);
            } elseif ($playerInventory->equip == '3') {
                $this->dispatchBrowserEvent('newMessage', ["msg" => "Atenção você possui esse item do cupom permanente em sua conta, tente outro cupom.", "icon" => "error"]);
                return;
            }
        }
        $this->dispatchBrowserEvent('newMessage', ["msg" => $message, "icon" => "success"]);
        $this->code = null;
    }

    private function addHistoryLog($coupon, $player)
    {
        return  History::insert([
            'player_id' => $player->player_id,
            'code' => $coupon->code,
            'item_name' => $coupon->item_name,
            'item_count' => $coupon->item_count,
            'type' => $coupon->type,
            'created_at' => now()
        ]);
    }

    protected function rules()
    {
        return ['code' => 'required|min:5|max:30|exists:coupon_codes,code'];
    }

    protected function messages()
    {
        return [
            'code.required' => 'É necessário incluir um cupom no formulário',
            'code.min' => 'O cupom necessita ter no minimo 5 caracteres',
            'code.max' => 'O cupom só pode ter no máximo 30 caracteres',
            'code.exists' => 'Este cupom é inválido'
        ];
    }
    
    public function render()
    {
        return view('pages.player.coupon');
    }
}
