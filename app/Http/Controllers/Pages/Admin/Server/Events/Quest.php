<?php

namespace App\Http\Controllers\Pages\Admin\Server\Events;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Date;
use App\Http\Controllers\Modules\Message;
use App\Models\Event\Quest as EventQuest;
use Illuminate\Http\Request;

class Quest extends Controller
{
    private $date;

    public function __construct()
    {
        $this->date = new Date();
    }

    public function  questAddAdminPage()
    {
        return view('pages.admin.server.events.quest', [
            'quests' => EventQuest::orderByDesc('event_id')->paginate(10),
            'date' => $this->date
        ]);
    }

    public function questAddProcess(Request $response)
    {
        $validatedData = $response->validate($this->rules(), $this->messages());
            $quest = new EventQuest();
            $quest->start_date = $this->date->convertDateServer($validatedData['start_date']);
            $quest->end_date = $this->date->convertDateServer($validatedData['end_date']);
            if ($quest->save()) {
                return redirect()->back()->with('message', Message::sendAlert(["msg" => "Novo evento quest adicionado!", "type" => "success"]));
            }
            return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar evento, contate o suporte do site.", "type" => "error"]));
    }

    public function questDeleteProcess(int $id)
    {
        $quest = EventQuest::findOrFail($id);
        $quest->delete();
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Evento quest foi deletado.", "type" => "success"]));
    }

    public function rules()
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'start_date.required' => 'O campo de início não pode estar vazio.',
            'start_date.date' => 'O campo de início deve ser uma data válida.',
            'end_date.required' => 'O campo de encerramento não pode estar vazio.',
            'end_date.date' => 'O campo de encerramento deve ser uma data válida.'
        ];
    }
}
