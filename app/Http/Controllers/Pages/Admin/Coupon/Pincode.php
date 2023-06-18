<?php

namespace App\Http\Controllers\Pages\Admin\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Message;
use App\Models\Coupon\Codes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Pincode extends Controller
{
    protected $rules = [
        'code' => 'required|unique:coupon_codes,code',
        'count' => 'required',
        'limit' => 'required',
        'type' => 'required'
    ];

    protected $messages = [
        'code.required' => 'É preciso gerar ou adicionar um cupom.',
        'code.unique' => 'Esse cupom já existe, tente outro.',
        'count.required' => 'Escolha um valor para o cupom.',
        'limit.required' => 'Escolha o limite de ativações para o cupom.',
        'type.required' => 'Selecione um tipo para o cupom.'
    ];

    public function pincodeAdminPage()
    {
        return view('pages.admin.coupon.pincode', [
            'pins' => Codes::where('type', '<=', 3)->orderByDesc('created_at')->paginate('10')
        ]);
    }

    public function type($value)
    {
        switch ($value) {
            case '1':
                return 'Gold';
            case '2':
                return 'Cash';
            case '3':
                return 'Coin';
        }
    }

    public function pincodeProccessCreate(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        $validated = $validator->validate();
        $pinCode = new Codes();
        $pinCode->code = strtoupper($validated['code']);
        $pinCode->item_id = '0';
        $pinCode->item_name = $this->type($validated['type']);
        $pinCode->item_category = '0';
        $pinCode->item_count = $validated['count'];
        $pinCode->limit = $validated['limit'];
        $pinCode->author = auth()->user()->login;
        $pinCode->type = $validated['type'];
        if ($pinCode->save()) {
            return redirect()->back()->with('message', Message::sendAlert(["msg" => "Cupom de " . number_format($validated['count']) . " " . $this->type($validated['type']) . " foi adicionado.", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar novo cupom, contate o suporte do site.", "type" => "error"]));
    }
}
