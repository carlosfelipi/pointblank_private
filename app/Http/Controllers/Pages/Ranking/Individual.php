<?php

namespace App\Http\Controllers\Pages\Ranking;

use App\Http\Controllers\Modules\Patent;
use App\Http\Controllers\Modules\Ranking;
use App\Models\Account;
use Livewire\Component;
use Livewire\WithPagination;

class Individual extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function resetSearch()
    {
        $this->search = null;
    }

    public function render()
    {
        return view('pages.ranking.individual', [
            'players' => Account::query()->when($this->search, fn ($q) => $q
                    ->where('player_name', 'like', '%' . $this->search . '%'))
                ->where('exp', '>=', '1000')
                ->where('rank', '<=', '51')
                ->where('access_level', '0')
                ->orderByDesc('exp')
                ->paginate(15),
            'ranking' => new Ranking(),
            'patent' => new Patent()
        ]);
    }
}
