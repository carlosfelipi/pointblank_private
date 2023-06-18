<?php

namespace App\Http\Controllers\Pages\Market;

use App\Http\Controllers\Modules\Item;
use App\Http\Controllers\Modules\Message;
use App\Models\Account;
use App\Models\PItens;
use App\Models\WebshopItens;
use Livewire\Component;

class Detail extends Component
{
    public $item;

    public function mount($item)
    {
        $item = WebshopItens::where('state', true)->findOrFail($item);
        $this->item = $item;
    }

    public function player()
    {
        return Account::find(auth()->user()->player_id);
    }

    public function inventory()
    {
        return PItens::where('item_id', $this->item->item_id)->where('owner_id', $this->player()->player_id)->first();
    }

    public function purchaseItem()
    {
        if (auth()->check()) {
            if ($this->player()->online != true) {
                if ($this->player()->coin >= $this->item->price) {
                    if ($this->inventory()) {
                        if ($this->inventory()->equip == 1) {
                            $this->inventory()->increment('count', $this->item->count);
                            $this->player()->increment('coin', -$this->item->price);
                            $this->dispatchBrowserEvent('newMessage', ["msg" => "Compra do item " . $this->item->item_name . ", efetuada com sucesso.", "icon" => "success"]);
                        } else if ($this->inventory()->equip == 2) {
                            $this->dispatchBrowserEvent('newMessage', ["msg" => "Você possui esse item abilitado em sua conta,aguarde ele expirar para poder comprar novamente.", "icon" => "info"]);
                        } else if ($this->inventory()->equip == 3) {
                            $this->dispatchBrowserEvent('newMessage', ["msg" => "Você possui esse item permanente em seu inventário, impossivel obter mais dias.", "icon" => "info"]);
                        }
                    } else {
                        $newItem = new PItens();
                        $newItem->owner_id = $this->player()->player_id;
                        $newItem->item_id = $this->item->item_id;
                        $newItem->item_name = strtoupper($this->item->item_name . ' (webshop)');
                        $newItem->count = $this->item->count;
                        $newItem->category = $this->item->category;
                        $newItem->equip = 1;
                        if ($newItem->save()) {
                            $this->player()->increment('coin', -$this->item->price);
                            Message::sendMessageBoxPlayer([
                                'player' => $this->player()->player_id,
                                'message' => 'Olá ' . $this->player()->player_name . ' o item ' . strtoupper($this->item->item_name) . ' obtido pelo Mercado Shark foi entregue em seu inventário, já pode ser usado no campo de batalha.'
                            ]);
                            $this->dispatchBrowserEvent('newMessage', ["msg" => "Compra do item " . $this->item->item_name . ", efetuada com sucesso.", "icon" => "success"]);
                        } else {
                            $this->dispatchBrowserEvent('newMessage', ["msg" => "Falha ao entregar o item, contate o suporte.", "icon" => "info"]);
                        }
                    }
                } else {
                    $this->dispatchBrowserEvent('newMessage', ["msg" => "Seu saldo está abaixo do valor do item.", "icon" => "info"]);
                }
            } else {
                $this->dispatchBrowserEvent('newMessage', ["msg" => "Para efetuar uma compra você precisa estar off-line no jogo.", "icon" => "info"]);
            }
        } else {
            $this->dispatchBrowserEvent('newMessage', ["msg" => "Para efetuar uma compra você precisa fazer o login.", "icon" => "info"]);
        }
    }

    public function render()
    {
        return view('pages.market.detail', [
            'item' => $this->item,
            'modulesItem' => new Item()
        ]);
    }
}
