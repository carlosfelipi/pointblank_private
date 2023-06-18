<?php

namespace App\Http\Controllers\Pages\Admin\Server\Events;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Date;
use App\Http\Controllers\Modules\Map;
use App\Http\Controllers\Modules\Message;
use App\Models\Event\Mapbonus as EventMapbonus;
use Illuminate\Http\Request;

class Mapbonus extends Controller
{
    private $date, $map;

    public function __construct()
    {
        $this->date = new Date();
        $this->map = new Map();
    }

    public  function mapBonusAddAdminPage()
    {
        return view('pages.admin.server.events.mapbonus', [
            'maps' => EventMapbonus::orderByDesc('event_id')->paginate(10),
            'fnDate'=> $this->date,
            'fnMap' => $this->map
        ]);
    }

    public function mapBonusAddProcess(Request $response)
    {
        $validatedData = $response->validate($this->rules(), $this->messages());
        $mapBonusData = new EventMapbonus();
        $mapBonusData->percent_xp = $validatedData['percent_xp'];
        $mapBonusData->percent_gp = $validatedData['percent_gp'];
        $mapBonusData->map_id = $validatedData['map_id'];
        $mapBonusData->stage_type = $validatedData['map_stage'];
        $mapBonusData->start_date = $this->date->convertDateServer($validatedData['start_date']);
        $mapBonusData->end_date = $this->date->convertDateServer($validatedData['end_date']);
        if ($mapBonusData->save()) {
            return redirect()->back()->with('message', Message::sendAlert(["msg" => "Novo evento de rankUp de mapa foi adicionado.", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar evento, contate o suporte do site.", "type" => "error"]));
    }

    public function mapBonusDeleteProcess(int $id)
    {
        $mapBonus = EventMapbonus::findOrFail($id);
        $mapBonus->delete();
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Evento de mapa foi deletado.", "type" => "success"]));
    }

    public function rules()
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'percent_xp' => 'required|integer|max:500000',
            'percent_gp' => 'required|integer|max:500000',
            'map_id' => 'required|integer',
            'map_stage' => 'required|integer'
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
            'map_id.required' => 'O campo de nome do mapa é obrigatório.',
            'map_id.integer' => 'O campo de nome do mapa deve ser um número inteiro.',
            'map_stage.required' => 'O campo de modo do mapa é obrigatório.',
            'map_stage.integer' => 'O campo de modo do mapa deve ser um número inteiro.',
        ];
    }
}
