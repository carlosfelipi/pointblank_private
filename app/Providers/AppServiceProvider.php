<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\PSeason;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use stdClass;

class AppServiceProvider extends ServiceProvider
{
    public function discountExp($exp)
    {
        return $exp * ((int)env('SEASON_EXP_PERCENTAGE') / 100);
    }

    public function boot(): void
    {
        //Season 
        if ((bool)env('SEASON_STATE') == true) {
            $players = Account::where('online', true)->where('exp', '>=', '5000')->get();
            foreach ($players as $player) {
                $playerSeason = PSeason::find($player->player_id);
                if ($playerSeason) {
                    if ($playerSeason->initial_exp != $player->exp) {
                        $newExp = $player->exp - $playerSeason->initial_exp;
                        $playerSeason->update([
                            'player_name' => $player->player_name,
                            'player_rank' => $player->rank,
                            'season_exp' => $this->discountExp($newExp),
                            'season_fights' => $player->fights - $playerSeason->initial_fights,
                            'season_fights_win' => $player->fights_win - $playerSeason->initial_fights_win,
                            'season_fights_lost' => $player->fights_lost - $playerSeason->initial_fights_lost,
                            'season_kills_count' => $player->kills_count - $playerSeason->initial_kills_count,
                            'season_deaths_count' => $player->deaths_count - $playerSeason->initial_deaths_count,
                            'season_headshots_count' => $player->headshots_count - $playerSeason->initial_headshots_count,
                            'season_escapes' => $player->escapes - $playerSeason->initial_escapes,
                            'season_fights_draw' => $player->fights_draw - $playerSeason->initial_fights_draw,
                            'season_totalkills_count' => $player->totalkills_count - $playerSeason->initial_totalkills_count,
                            'season_totalfights_count' => $player->totalfights_count - $playerSeason->initial_totalfights_count,
                            'season_gp' => $player->gp - $playerSeason->initial_gp,
                            'season_coin' => $player->coin - $playerSeason->initial_coin,
                            'season_money' => $player->money - $playerSeason->initial_money,
                            'updated_at' => Carbon::now()
                        ]);
                    }
                } else {
                    PSeason::insert([
                        'player_id' => $player->player_id,
                        'player_name' => $player->player_name,
                        'player_rank' => $player->rank,
                        'initial_exp' => $player->exp,
                        'initial_fights' => $player->fights,
                        'initial_fights_win' => $player->fights_win,
                        'initial_fights_lost' => $player->fights_lost,
                        'initial_kills_count' => $player->kills_count,
                        'initial_deaths_count' => $player->deaths_count,
                        'initial_headshots_count' => $player->headshots_count,
                        'initial_escapes' => $player->escapes,
                        'initial_fights_draw' => $player->fights_draw,
                        'initial_totalkills_count' => $player->totalkills_count,
                        'initial_totalfights_count' => $player->totalfights_count,
                        'initial_gp' => $player->gp,
                        'initial_coin' => $player->coin,
                        'initial_money' => $player->money,
                        'created_at' => Carbon::now(),
                        'expired_at' => Carbon::now()->addDays(30)
                    ]);
                }
            }
        }

        $onlines = Account::where('online', true)->count();
        $rankup = DB::table('events_rankup')->first();
        $global = new stdClass();
        $global->onlines = $onlines;
        $global->rankup = $rankup;
        view()->share('global', $global);
    }
}
