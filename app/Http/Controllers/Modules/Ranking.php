<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Clan;
use App\Models\PSeason;
use Illuminate\Support\Facades\DB;

class Ranking extends Controller
{
    public function getPosition($modelClass, $id, $orderBy, $rankColumn, $conditions)
    {
        $model = new $modelClass;
        $query = $model->select($model->getKeyName(), DB::raw("ROW_NUMBER() OVER (ORDER BY $orderBy) as $rankColumn"))
            ->where($conditions);
        $result = $query->pluck($rankColumn, $model->getKeyName());
        return $result[$id] ?? null;
    }

    public function positionPlayer(int $id)
    {
        $conditions = [
            ['access_level', '=', 0],
            ['rank', '<=', 51]
        ];

        $accountModel = new Account;
        return $this->getPosition($accountModel, $id, 'exp DESC', 'rank', $conditions);
    }

    public function positionPlayerSeason(int $id)
    {
        $conditions = [
            ['season_exp', '>', 0]
        ];

        $pSeasonModel = new PSeason;
        return $this->getPosition($pSeasonModel, $id, 'season_exp DESC', 'player_rank', $conditions);
    }

    public function positionClan(int $id)
    {
        $conditions = [];

        $clanModel = new Clan;
        return $this->getPosition($clanModel, $id, 'clan_exp DESC', 'clan_rank', $conditions);
    }

    public function rateKd($kills, $deaths)
    {
        $kd = $kills + $deaths > 0 ? number_format(($kills / ($kills + $deaths)) * 100, 0) : 0;
        return $kd . '%';
    }

    public function rateHs($headShots, $totalKills)
    {
        $hs = $totalKills > 0 ? number_format(($headShots / $totalKills) * 100, 0) : 0;
        return $hs . '%';
    }

    public function rateWin($fightsWin, $fights)
    {
        $win = $fights > 0 ? number_format(($fightsWin / $fights) * 100, 0) : 0;
        return $win . '%';
    }

    public function rateWinClan($clan)
    {
        $win = $clan->partidas > 0 ? number_format(($clan->vitorias / $clan->partidas) * 100, 0) : 0;
        return $win . '%';
    }

    public function clanAccess($player)
    {
        switch ($player) {
            case '0':
                return 'Desconhecido';
            case '1':
                return 'Master';
            case '2':
                return 'Auxiliar';
            case '3':
                return 'Membro';
        }
    }
}
