<?php

namespace App\Http\Controllers\Pages\Admin\Webshop;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Item;
use App\Http\Controllers\Modules\Message;
use App\Models\WebshopItens;
use Illuminate\Http\Request;

class Manager extends Controller
{ 
    private $item;

    public function __construct()
    {
        $this->item = new Item();
    }

    public function webShopItensAdminPage()
    {
        return view('pages.admin.webshop.manager', [
            'itens' => WebshopItens::orderBy('created_at', 'desc')->get(),
            'modulesItem' => $this->item
        ]);
    }

    public function webShopProccessUpdate(Request $request)
    {
        $validated = $request->validate($this->rules(), $this->messages());
        $webShop = WebshopItens::findOrFail($request->id);
        $webShop->item_name = $validated['name'];
        if ($validated['type'] == 1) {
            $webShop->count = $validated['count']; //Und
        } else {
            $webShop->count = $this->item->convertDaysToSeconds($validated['count']); //Day
        }
        $webShop->type = $validated['type'];
        $webShop->category = $validated['slot'];
        $webShop->tag = $validated['tag'];
        $webShop->price = $validated['price'];
        if ($validated['state'] == 1) {
            $webShop->state = true;
        } else {
            $webShop->state = false;
        }
        if ($webShop->save()) {
            return redirect()->back()->with('message', Message::sendAlert(["msg" => "Item $webShop->item_name foi atualizado.", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar novo cupom, contate o suporte do site.", "type" => "error"]));
    }

    public function webShopProccessDelete(int $item)
    {
        $webShop = WebshopItens::findOrFail($item);
        $webShop->delete();
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Item $webShop->item_name  foi deletado.", "type" => "success"]));
    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'tag' => 'required|in:"1","2","3","4"',
            'type' => 'required|in:"1","2"',
            'state' => 'required|in:"1","2"',
            'count' => 'required',
            'slot' => 'required|in:"1","2","3"',
            'price' => 'required'
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'É preciso adicionar um nome para o item do webshop.',
            'tag.required' => 'Escolha uma tag para o item do webshop.',
            'tag.in' => 'Tag selecionada é inválida ou não suportada.',
            'price.required' => 'Escolha um valor de compra para o item do webshop.',
            'type.required' => 'Escolha uma categoria do item para o webshop.',
            'type.in' => 'Categoria selecionada é inválida ou não suportada.',
            'count.required' => 'Escolha uma duração do item para o webshop.',
            'slot.required' => 'Escolha um slot para o item do webshop.',
            'slot.in' => 'Slot selecionado é inválida ou não suportada.',
            'state.required' => 'Escolha um status para o item do webshop.',
            'state.in' => 'Status selecionado é inválido ou não suportado.'
        ];
    }
}
