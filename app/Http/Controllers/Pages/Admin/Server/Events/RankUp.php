<?php

namespace App\Http\Controllers\Pages\Admin\Server\Events;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Date;
use App\Http\Controllers\Modules\Message;
use App\Models\Event\RankUp as EventRankUp;
use Illuminate\Http\Request;

class RankUp extends Controller
{
    private $date;

    public function __construct()
    {
        $this->date = new Date();
    }

    public function  rankUpAddAdminPage()
    {
        return view('pages.admin.server.events.rankup', [
            'rankUp' => EventRankUp::orderByDesc('event_id')->paginate(10),
            'date' => $this->date
        ]);
    }

    public function rankUpAddProcess(Request $response)
    {
        $validatedData = $response->validate($this->rules(), $this->messages());
        $rankUpData = new EventRankUp();
        $rankUpData->start_date = $this->date->convertDateServer($validatedData['start_date']);
        $rankUpData->end_date = $this->date->convertDateServer($validatedData['end_date']);
        $rankUpData->percent_xp = $validatedData['percent_xp'];
        $rankUpData->percent_gp = $validatedData['percent_gp'];
        if ($rankUpData->save()) {
            return redirect()->back()->with('message', Message::sendAlert(["msg" => "Novo evento rankup adicionado!", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar evento, contate o suporte do site.", "type" => "error"]));
    }

    public function rankUpDeleteProcess(int $id)
    {
        $rankUp = EventRankUp::findOrFail($id);
        $rankUp->delete();
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Evento rankUp foi deletado.", "type" => "success"]));
    }

    public function rules()
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'percent_xp' => 'required|integer|max:500000',
            'percent_gp' => 'required|integer|max:500000',
        ];
    }

    public function messages()
    {
        return [
            'start_date.required' => 'O campo de início não pode estar vazio.',
            'start_date.date' => 'O campo de início deve ser uma data válida.',
            'end_date.required' => 'O campo de encerramento não pode estar vazio.',
            'end_date.date' => 'O campo de encerramento deve ser uma data válida.',
            'percent_xp.required' => 'O campo de exp é obrigatório.',
            'percent_xp.integer' => 'O campo exp deve ser um número inteiro.',
            'percent_xp.max' => 'O campo exp não pode ser maior que 500.000.',
            'percent_gp.required' => 'O campo gold é obrigatório.',
            'percent_gp.integer' => 'O campo gold deve ser um número inteiro.',
            'percent_gp.max' => 'O campo gold não pode ser maior que 500.000.',
        ];
    }
}
