<?php

namespace App\Http\Controllers\Pages\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Item;
use App\Http\Controllers\Modules\Message;
use App\Models\Coupon\Items;
use App\Models\WebshopItens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Webshop extends Controller
{
    private $item;

    public function __construct()
    {
        $this->item = new Item();
    }

    public function webShopAdminPage()
    {
        return view('pages.admin.webshop.add', [
            'itens' => Items::orderBy('id', 'asc')->get()
        ]);
    }

    public function webShopProccessCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'item' => 'required',
            'tag' => 'required|in:"1","2","3","4"',
            'type' => 'required|in:"1","2"',
            'count' => 'required',
            'slot' => 'required|in:"1","2","3"',
            'image' => 'required',
            'price' => 'required'
        ], [
            'name.required' => 'É preciso adicionar um nome para o item do webshop.',
            'item.required' => 'É preciso selecionar um item para o webshop.',
            'tag.required' => 'Escolha uma tag para o item do webshop.',
            'tag.in' => 'Tag selecionada é inválida ou não suportada.',
            'price.required' => 'Escolha um valor de compra para o item do webshop.',
            'type.required' => 'Escolha uma categoria do item para o webshop.',
            'type.in' => 'Categoria selecionada é inválida ou não suportada.',
            'count.required' => 'Escolha uma duração do item para o webshop.',
            'slot.required' => 'Escolha um slot para o item do webshop.',
            'slot.in' => 'Slot selecionado é inválida ou não suportada.',
            'image.required' => 'Escolha um image para o item do webshop.'
        ]);
        $validated = $validator->validate();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $type = $request->file('image')->getMimeType();
            $file = $request->file('image');
            $binString = file_get_contents($file);
            $hexString = base64_encode($binString);
            $image  = 'data:' . 'webshop' . '/' . $type . ';base64,' . $hexString;
        }
        $item = Items::find($validated['item']);
        $webShop = new WebshopItens();
        $webShop->item_id = $item->item_id;
        $webShop->item_name = $validated['name'];
        if ($validated['type'] == 1) {
            $webShop->count = $validated['count']; //Und
        } else {
            $webShop->count = $this->item->convertDays($validated['count']); //Day
        }
        $webShop->type = $validated['type'];
        $webShop->category = $validated['slot'];
        $webShop->tag = $validated['tag'];
        $webShop->price = $validated['price'];
        $webShop->image = $image;
        $webShop->state = true;
        if ($webShop->save()) {
            return redirect()->route('webShopItensAdminPage')->with('message', Message::sendAlert(["msg" => "Item $webShop->item_name foi adicionado ao webshop.", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar novo cupom, contate o suporte do site.", "type" => "error"]));
    }

    public function webShopItensAdminPage()
    {
        return view('pages.admin.webshop.itens', [
            'itens' => WebshopItens::orderBy('created_at', 'desc')->get(),
            'modulesItem' => $this->item
        ]);
    }

    public function webShopProccessUpdate(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tag' => 'required|in:"1","2","3","4"',
            'type' => 'required|in:"1","2"',
            'state' => 'required|in:"1","2"',
            'count' => 'required',
            'slot' => 'required|in:"1","2","3"',
            'price' => 'required'
        ], [
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
            'state.in' => 'Status selecionado é inválido ou não suportado.',
        ]);

        $validated = $validator->validate();
        $webShop = WebshopItens::findOrFail($request->id);
        $webShop->item_name = $validated['name'];
        if ($validated['type'] == 1) {
            $webShop->count = $validated['count']; //Und
        } else {
            $webShop->count = $this->item->convertDays($validated['count']); //Day
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
}
