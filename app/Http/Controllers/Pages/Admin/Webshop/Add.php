<?php

namespace App\Http\Controllers\Pages\Admin\Webshop;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Item;
use App\Http\Controllers\Modules\Message;
use App\Http\Controllers\Modules\Upload;
use App\Models\Coupon\Items;
use App\Models\WebshopItens;
use Illuminate\Http\Request;

class Add extends Controller
{
    private $item, $upload;

    public function __construct()
    {
        $this->item = new Item();
        $this->upload = new Upload();
    }

    public function webShopAdminPage()
    {
        return view('pages.admin.webshop.add', [
            'itens' => Items::orderBy('id', 'asc')->get()
        ]);
    }

    public function webShopProccessCreate(Request $request)
    {
        $validated = $request->validate($this->rules(), $this->messages());
        $image =
            $request->hasFile('image') && $request->file('image')->isValid()
            ? $this->upload->encodeImage($request->file('image'))
            : null;
        $item = Items::find($validated['item']);
        $webShop = new WebshopItens();
        $webShop->item_id = $item->item_id;
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
        $webShop->image = $image;
        $webShop->state = true;
        if ($webShop->save()) {
            return redirect()->route('webShopItensAdminPage')->with('message', Message::sendAlert(["msg" => "Item $webShop->item_name foi adicionado ao webshop.", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar novo cupom, contate o suporte do site.", "type" => "error"]));
    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'item' => 'required',
            'tag' => 'required|in:"1","2","3","4"',
            'type' => 'required|in:"1","2"',
            'count' => 'required',
            'slot' => 'required|in:"1","2","3"',
            'image' => 'required',
            'price' => 'required'
        ];
    }

    protected function messages()
    {
        return [
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
        ];
    }
}
