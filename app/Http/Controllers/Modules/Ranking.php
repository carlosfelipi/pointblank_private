<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Clan;
use App\Models\PSeason;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;

class Ranking extends Controller
{

    public function positionPlayer(int $id)
    {
        $players = Account::select(
            'accounts.player_id',
            'accounts.player_name',
            DB::raw('ROW_NUMBER () OVER ( ORDER BY exp DESC ) as rank')
        )
            ->where('access_level', '0')
            ->where('rank', '<=', '51')
            ->get();
        foreach ($players as $player) {
            if ($player->player_id == $id) {
                return $player->rank;
            }
        }
        return null;
    }

    public function positionPlayerSeason(int $id)
    {
        $players = PSeason::select(
            'player_season.player_id',
            'player_season.player_name',
            DB::raw('ROW_NUMBER () OVER ( ORDER BY season_exp DESC ) as player_rank')
        )
            ->where('season_exp', '>', '0')
            ->get();
        foreach ($players as $player) {
            if ($player->player_id == $id) {
                return $player->player_rank;
            }
        }
        return null;
    }

    public function rateKd($kills, $deaths)
    {
        $kd = $kills ? round(($kills / ($kills + $deaths)) * 100) : 0;
        return $kd . '%';
    }

    public function rateHs($headShots, $totalKills)
    {
        $hs = $headShots ? ($headShots * 100) / $totalKills : 0;
        return round($hs) . '%';
    }

    public function rateWin($fightsWin, $fights)
    {
        $win = $fightsWin ? round(($fightsWin / $fights) * 100) : 0;
        return $win . '%';
    }

    public function positionClan(int $id)
    {
        $clans = Clan::select(
            'clan_data.clan_id',
            DB::raw('ROW_NUMBER () OVER ( ORDER BY clan_exp DESC ) as clan_rank')
        )->get();
        foreach ($clans as $clan) {
            if ($clan->clan_id == $id) {
                return $clan->clan_rank;
            }
        }
        return null;
    }

    public function rateWinClan($clan)
    {
        $win = $clan->vitorias ? round(($clan->vitorias / $clan->partidas) * 100) : 0;
        return round($win) . '%';
    }

    public function clanAccess($player)
    {
        switch ($player) {
            case '0':
                return 'Nodata';
            case '1':
                return 'Membro';
            case '2':
                return 'Auxiliar';
            case '3':
                return 'Master';
        }
    }
}
