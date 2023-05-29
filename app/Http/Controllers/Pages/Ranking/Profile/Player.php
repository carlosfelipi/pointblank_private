<?php

namespace App\Http\Controllers\Pages\Ranking\Profile;

use App\Http\Controllers\Modules\Date;
use App\Http\Controllers\Modules\Namecolor;
use App\Http\Controllers\Modules\Patent;
use App\Http\Controllers\Modules\Ranking;
use App\Models\Account;
use App\Models\Clan;
use App\Models\Shop;
use Livewire\Component;

class Player extends Component
{
    public $player;

    public function mount($id)
    {
        $player = Account::where('player_id', $id)->firstOrFail();
        $this->player = $player;
    }

    public function clanPlayer()
    {
        return Clan::where('clan_id', $this->player->clan_id)->first();
    }

    public function imagem($item)
    {
        if (file_exists('assets/images/itens/' . $item . '.png')) {
            return '<img src="' . asset('assets/images/itens/' . $item . '.png') . '" />';
        } else {
            return '<img src="' . asset('assets/images/itens/0.png') . '" width="110px"/>';
        }
    }

    public function weaponEquiped($item)
    {
        $name = Shop::query()->where('item_id', $item)->first();
        if ($name) {
            return str_replace('_', ' ', $name->item_name);
        } else {
            return 'Não Encontrado';
        }
    }

    public function render()
    {
        return view('pages.ranking.profile.player', [
            'player' => $this->player,
            'patent' => new Patent(),
            'ranking' => new Ranking(),
            'namecolor' => new Namecolor(),
            'date' => new Date()
        ]);
    }
}
