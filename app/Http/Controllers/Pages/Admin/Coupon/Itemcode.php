<?php

namespace App\Http\Controllers\Pages\Admin\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Message;
use App\Models\Coupon\Codes;
use App\Models\Coupon\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Itemcode extends Controller
{

    protected $rules = [
        'code' => 'required|unique:coupon_codes,code',
        'item' => 'required',
        'limit' => 'required',
        'category' => 'required',
        'count' => 'required',
        'slot' => 'required'
    ];

    protected $messages = [
        'code.required' => 'É preciso gerar ou adicionar um cupom.',
        'code.unique' => 'Esse cupom já existe, tente outro.',
        'item.required' => 'Escolha um item para o cupom.',
        'limit.required' => 'Escolha o limite de ativações para o cupom.',
        'category.required' => 'Escolha uma categoria para o cupom.',
        'count.required' => 'Escolha uma duração para o cupom.',
        'slot.required' => 'Escolha um slot para o cupom.'
    ];

    public function itemcodeAdminPage()
    {
        $codes = Codes::get();
        foreach ($codes as $item) {
            if ($item->limit == 0) {
                $item->delete();
            }
        }
        return view('pages.admin.coupon.itemcode', [
            'itens' => Items::get(),
            'pins' => Codes::where('type', 4)->orderByDesc('created_at')->paginate('10')
        ]);
    }

    public function itemcodeProccessCreate(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        $validated = $validator->validate();
        $item = Items::find($validated['item']);
        $itemCode = new Codes();
        $itemCode->code = strtoupper($validated['code']);
        $itemCode->item_id = $item->item_id;
        $itemCode->item_name = $item->item_name;
        if ($validated['category'] == 1) {
            $itemCode->item_count = $validated['count']; //Unidades
        } else {
            $itemCode->item_count = $validated['count'] * 24 * 3600; //Dias
        }
        $itemCode->item_category = $validated['slot'];
        $itemCode->limit = $validated['limit'];
        $itemCode->author = auth()->user()->login;
        $itemCode->type = 4;
        if ($itemCode->save()) {
            return redirect()->back()->with('message', Message::sendAlert(["msg" => "Cupom $item->item_name foi adicionado.", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar novo cupom, contate o suporte do site.", "type" => "error"]));
    }

    public function itemcodeProccessDelete(int $item)
    {
        $itemCode = Codes::findOrFail($item);
        $itemCode->delete();
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Cupom $itemCode->item_name  foi deletado.", "type" => "success"]));
    }
}
