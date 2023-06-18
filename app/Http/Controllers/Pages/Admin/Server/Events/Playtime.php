<?php

namespace App\Http\Controllers\Pages\Admin\Server\Events;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Date;
use App\Http\Controllers\Modules\Item;
use App\Http\Controllers\Modules\Message;
use App\Models\Event\Playtime as EventPlaytime;
use App\Models\Shop;
use Illuminate\Http\Request;

class Playtime extends Controller
{
    private $date, $item;

    public function __construct()
    {
        $this->date = new Date();
        $this->item = new Item();
    }

    public function  playTimeAddAdminPage()
    {
        return view('pages.admin.server.events.playTime', [
            'playTimes' => EventPlaytime::orderByDesc('event_id')->paginate(10),
            'itens' => Shop::whereIn('visibility', [0, 4])->orderBy('item_id', 'asc')->get(),
            'date' => $this->date,
            'fnItem' => $this->item
        ]);
    }

    private function getItemShop($goodId)
    {
        return Shop::lockForUpdate()->find($goodId);
    }

    public function playTimeAddProcess(Request $response)
    {
        $validatedData = $response->validate($this->rules(), $this->messages());
        $playTimeData = new EventPlaytime();
        $playTimeData->title = $validatedData['title'];
        $playTimeData->good_reward1 = $validatedData['idOne'];
        $playTimeData->good_reward2 = $validatedData['idTwo'];
        $playTimeData->seconds_target =  $this->date->convertToSeconds($validatedData['seconds']);
        $playTimeData->good_count1 = $this->getItemShop($validatedData['idOne'])->count;
        $playTimeData->good_count2 = $this->getItemShop($validatedData['idTwo'])->count;
        $playTimeData->start_date = $this->date->convertDateServer($validatedData['start_date']);
        $playTimeData->end_date = $this->date->convertDateServer($validatedData['end_date']);
        if ($playTimeData->save()) {
            return redirect()->back()->with('message', Message::sendAlert(["msg" => "Novo evento de playtime adicionado!", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar evento, contate o suporte do site.", "type" => "error"]));
    }

    public function playTimeDeleteProcess(int $id)
    {
        $playTime = EventPlaytime::findOrFail($id);
        $playTime->delete();
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Evento de playtime foi deletado.", "type" => "success"]));
    }

    public function rules()
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'idOne' => 'required|integer',
            'idTwo' => 'required|integer',
            //'countOne' => 'required|integer|between:1,3000',
            // 'countTwo' => 'required|integer|between:1,3000',
            'title' => 'required|string|max:255|min:5',
            'seconds' => 'required|integer'
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
            'idTwo.required' => 'O campo ID 2 é obrigatório.',
            'idTwo.integer' => 'O campo ID 2 deve ser um número inteiro.',
            //'countOne.required' => 'O campo de duração 1 é obrigatório.',
            // 'countOne.integer' => 'O campo de duração 1 deve ser um número inteiro.',
            // 'countOne.between' => 'O campo de duração 1 deve estar entre :min e :max.',
            // 'countTwo.required' => 'O campo de duração 2 é obrigatório.',
            //  'countTwo.integer' => 'O campo de duração 2 deve ser um número inteiro.',
            //  'countTwo.between' => 'O campo de duração 2 deve estar entre :min e :max.',
            'title.required' => 'O campo título é obrigatório.',
            'title.string' => 'O campo título deve ser uma string.',
            'title.max' => 'O campo título deve ter no máximo :max caracteres.',
            'title.min' => 'O campo título deve ter no mínimo :min caracteres.',
            'seconds.required' => 'O campo de minutos é obrigatório.',
            'seconds.integer' => 'O campo de minutos deve ser um número inteiro.'
        ];
    }
}
