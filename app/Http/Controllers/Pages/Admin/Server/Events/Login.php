<?php

namespace App\Http\Controllers\Pages\Admin\Server\Events;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Date;
use App\Http\Controllers\Modules\Item;
use App\Http\Controllers\Modules\Message;
use App\Models\Coupon\Items;
use App\Models\Event\Login as EventLogin;
use Illuminate\Http\Request;

class Login extends Controller
{
    private $date, $item;

    public function __construct()
    {
        $this->date = new Date();
        $this->item = new Item();
    }

    public function  loginAddAdminPage()
    {
        return view('pages.admin.server.events.login', [
            'logins' => EventLogin::orderByDesc('event_id')->paginate(10),
            'itens' => Items::orderBy('id', 'asc')->get(),
            'fndate' => $this->date,
            'fnItem' => $this->item
        ]);
    }

    public function loginAddProcess(Request $response)
    {
        $validatedData = $response->validate($this->rules(), $this->messages());
        $loginData = new EventLogin();
        $loginData->reward_id = $validatedData['idOne'];
        $loginData->reward_count =  $this->item->convertDaysToSeconds($validatedData['countOne']);
        $loginData->start_date = $this->date->convertDateServer($validatedData['start_date']);
        $loginData->end_date = $this->date->convertDateServer($validatedData['end_date']);
        if ($loginData->save()) {
            return redirect()->back()->with('message', Message::sendAlert(["msg" => "Novo evento de login adicionado!", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar evento, contate o suporte do site.", "type" => "error"]));
    }

    public function loginDeleteProcess(int $id)
    {
        $login = EventLogin::findOrFail($id);
        $login->delete();
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Evento de login foi deletado.", "type" => "success"]));
    }

    public function rules()
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'idOne' => 'required|integer',
            'countOne' => 'required|integer|between:1,3000'
        ];
    }

    public function messages()
    {
        return [
            'start_date.required' => 'A data de início é obrigatória.',
            'start_date.date' => 'A data de início deve ser um formato de data válido.',
            'end_date.required' => 'A data de encerramento é obrigatória.',
            'end_date.date' => 'A data de encerramento deve ser um formato de data válido.',
            'idOne.required' => 'O campo ID 1 é obrigatório.',
            'idOne.integer' => 'O campo ID 1 deve ser um número inteiro.',
            'countOne.required' => 'O campo de duração 1 é obrigatório.',
            'countOne.integer' => 'O campo de duração 1 deve ser um número inteiro.',
            'countOne.between' => 'O campo de duração 1 deve estar entre :min e :max.',
        ];
    }
}
