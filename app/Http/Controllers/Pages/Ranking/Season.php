<?php

namespace App\Http\Controllers\Pages\Ranking;

use App\Http\Controllers\Modules\Date;
use App\Http\Controllers\Modules\Patent;
use App\Http\Controllers\Modules\Ranking;
use App\Models\Account;
use App\Models\PSeason;
use Livewire\Component;
use Livewire\WithPagination;

class Season extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function resetSearch()
    {
        $this->search = null;
    }

    public function account($player)
    {
        return Account::find($player);
    }

    public function render()
    {
        return view('pages.ranking.season', [
            'players' => PSeason::query()->when($this->search, fn ($q) => $q
                ->where('player_name', 'like', '%' . $this->search . '%'))
                ->where('season_exp', '>', '0')
                ->orderByDesc('season_exp')
                ->paginate(15),
            'ranking' => new Ranking(),
            'patent' => new Patent(),
            'date'=> new Date()
        ]);
    }
}
