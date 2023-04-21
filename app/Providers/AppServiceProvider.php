<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\Battle\PlayerBattlePass;
use App\Models\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function discountExp($exp)
    {
        return $exp * (env('BATTLE_PASS_EXP_PERCENTAGE') / 100);
    }



    public function boot(): void
    {
        if (env('BATTLE_PASS_STATE') == true) {
            $players = Account::where('online', true)->get();
            foreach ($players as $player) {
                $playerBattle = PlayerBattlePass::find($player->player_id);
                if ($playerBattle) {
                    if ($playerBattle->initial_exp != $player->exp) {
                        $newExp = $player->exp - $playerBattle->initial_exp;
                        $playerBattle->update([
                            'battle_exp' => $this->discountExp($newExp)
                        ]);
                    }
                } else {
                    PlayerBattlePass::insert([
                        'player_id' => $player->player_id,
                        'initial_exp' => $player->exp,
                        'created_at' => Carbon::now()
                    ]);
                }
            }










            // foreach ($players as $player) {
            //     $playerBattle = DB::table('player_battle_pass')->where('player_id', $player->player_id)->first();
            //     //dd($playerBattle);
            //     if ($playerBattle) {
            //         $playerBattle = DB::table('player_battle_pass')->where('player_id', $player->player_id)->update([
            //             'battle_exp' => $player->exp
            //         ]);
            //     } else {
            //         DB::table('player_battle_pass')->insert([
            //             'player_id' => $player->player_id,
            //             'initial_exp' => $player->exp
            //         ]);
            //     }
            // }
        }




        view()->share([
            'config' => Config::first()
        ]);
    }
}
