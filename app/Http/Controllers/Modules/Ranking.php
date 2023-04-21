<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class Ranking extends Controller
{
    public function positionplayer(int $id)
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

    public function rateKd(Account $player)
    {
        $kd = $player->kills_count ? round(($player->kills_count / ($player->kills_count + $player->deaths_count)) * 100) : 0;
        return $kd . '%';
    }

    public function rateHs(Account $player)
    {
        $hs = $player->headshots_count ? ($player->headshots_count * 100) / $player->totalkills_count : 0;
        return round($hs) . '%';
    }

    public function rateWin(Account $player)
    {
        $win = $player->fights_win ? round(($player->fights_win / $player->fights) * 100) : 0;
        return $win . '%';
    }

    public function signatureBackground($rank)
    {
        if ($rank <= 4) {
            return 'dark';
        } elseif ($rank <= 16) {
            return 'brown';
        } elseif ($rank <= 30) {
            return 'blue';
        } elseif ($rank <= 45) {
            return 'green';
        } elseif ($rank <= 50) {
            return 'red';
        } elseif ($rank == 51) {
            return 'dark';
        } else {
            return 'dark';
        }
    }
}
