<?php

namespace App\Http\Controllers\Pages\Market;

use App\Http\Controllers\Modules\Item;
use App\Http\Controllers\Modules\Message;
use App\Models\Account;
use App\Models\PItens;
use App\Models\WebshopItens;
use Livewire\Component;
use Livewire\WithPagination;

class Itens extends Component
{
    use WithPagination;
    public bool $modalItem = false;

    public int $modalItemId = 0;

    public function modalState(bool $state)
    {
        $this->modalItem = $state;
    }

    public function detailItem(int $id)
    {
        $this->modalState(true);
        $this->modalItemId = $id;
    }

    public function pullItem()
    {
        return WebshopItens::where('state', true)->find($this->modalItemId);
    }

    public function player()
    {
        return Account::find(auth()->user()->player_id);
    }

    public function inventory()
    {
        return PItens::where('item_id', $this->pullItem()->item_id)->where('owner_id',$this->player()->player_id)->first();
    }

    public function purchaseItem()
    {
        if ($this->player()->online != true) {
            if ($this->player()->coin >= $this->pullItem()->price) {
                if ($this->inventory()) {
                    if ($this->inventory()->equip == 1) {
                        $this->inventory()->increment('count', $this->pullItem()->count);
                        $this->player()->increment('coin', -$this->pullItem()->price);
                        $this->dispatchBrowserEvent('newMessage', ["msg" => "Compra do item " . $this->pullItem()->item_name . ", efetuada com sucesso.", "icon" => "success"]);
                    } else if ($this->inventory()->equip == 2) {
                        $this->dispatchBrowserEvent('newMessage', ["msg" => "Você possui esse item abilitado em sua conta,aguarde ele expirar para poder comprar novamente.", "icon" => "info"]);
                    } else if ($this->inventory()->equip == 3) {
                        $this->dispatchBrowserEvent('newMessage', ["msg" => "Você possui esse item permanente em seu inventário, impossivel obter mais dias.", "icon" => "info"]);
                    }
                } else {
                    $newItem = new PItens();
                    $newItem->owner_id = $this->player()->player_id;
                    $newItem->item_id = $this->pullItem()->item_id;
                    $newItem->item_name = strtoupper($this->pullItem()->item_name . ' (webshop)');
                    $newItem->count = $this->pullItem()->count;
                    $newItem->category = $this->pullItem()->category;
                    $newItem->equip = 1;
                    if ($newItem->save()) {
                        $this->player()->increment('coin', -$this->pullItem()->price);
                        Message::sendMessageBoxPlayer([
                            'player' => $this->player()->player_id,
                            'message' => 'Olá ' . $this->player()->player_name . ' o item ' . strtoupper($this->pullItem()->item_name) . ' obtido pelo Mercado Shark foi entregue em seu inventário, já pode ser usado no campo de batalha.'
                        ]);
                        $this->dispatchBrowserEvent('newMessage', ["msg" => "Compra do item " . $this->pullItem()->item_name . ", efetuada com sucesso.", "icon" => "success"]);
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
    }

    public function render()
    {
        return view('pages.market.itens', [
            'itens' => WebshopItens::where('state', true)->orderByDesc('created_at')->paginate(10),
            'modulesItem' => new Item()
        ]);
    }
}
