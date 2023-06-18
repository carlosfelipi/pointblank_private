<?php

namespace App\Http\Controllers\Pages\Ranking;

use App\Http\Controllers\Modules\Patent;
use App\Http\Controllers\Modules\Ranking;
use App\Models\Account;
use App\Models\Clan as ModelsClan;
use Livewire\Component;

class Clan extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function resetSearch()
    {
        $this->search = null;
    }

    public function members(ModelsClan $clan)
    {
        return Account::query()->where('clan_id', $clan->clan_id)->count();
    }

    public function render()
    {
        return view('pages.ranking.clan', [
            'clans' => ModelsClan::query()->join(
                'accounts',
                'accounts.player_id',
                'clan_data.owner_id'
            )->when($this->search, fn ($q) => $q
                ->where('clan_name', 'like', '%' . $this->search . '%'))
                ->where('clan_exp', '=', '0')
                ->orderByDesc('clan_exp')
                ->paginate('15'),
            'ranking' => new Ranking(),
            'patent' => new Patent()
        ]);
    }
}
