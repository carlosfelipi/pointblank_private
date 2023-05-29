<?php

namespace App\Http\Controllers\Pages\Player;

use App\Http\Controllers\Controller;
use App\Models\RouletteHistory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Roulette extends Controller
{
    public function roulettePage()
    {
        return view('pages.player.roulette');
    }

    public function spinRoulette()
    {

        //320 - 0 
        //280 - 1
        //240 - 2
        //200 - 3
        //160 - 4
        //120 - 5
        //80 - 6
        //40 - 7
        //0 - 8
        $tempo = RouletteHistory::where('player_id', Auth::user()->player_id)->where('data', '=', date('dmY'))->count();

     
            if ($tempo != 0) {
                return 10;
            }
     

        $random = rand(0, 7);
        $mt = mt_rand(10, 50);
        if ($random == 0) {
            //Premio 1
            $rol = RouletteHistory::create([
                'player_id' => Auth::user()->player_id,
                'random' => $random,
                'degrees' => 320,
                'data' => date('dmY'),
                'award' => "C4 Speed Up Roleta Diaria"
            ]);
            // if ($rol) {
            //     $arma = armas_jogadores::where('owner_id', Auth::user()->player_id)->where('item_id', '=', "1300034030")->where('equip', '=', 1)->count();
            //     if ($arma != 0) {
            //         $e = armas_jogadores::where('owner_id', Auth::user()->player_id)
            //             ->where('item_id', '=', "1300034030")
            //             ->where('equip', '=', 1)->first();
            //         $arma = armas_jogadores::where('owner_id', Auth::user()->player_id)
            //             ->where('item_id', '=', "1300034030")
            //             ->where('equip', '=', 1)->update([
            //                 'count' => $e->count + 1
            //             ]);
            //     } else {
            //         armas_jogadores::create([
            //             'owner_id' => Auth::user()->player_id,
            //             'item_id' => "1300034030",
            //             'item_name' => "C4 Speed Up Roleta Diaria",
            //             'count' => "1",
            //             'category' => "2",
            //             'equip' => 1
            //         ]);
            //     }
            // }

        } else if ($random == 1) {
            $rol = RouletteHistory::create([
                'player_id' => Auth::user()->player_id,
                'random' => $random,
                'degrees' => 280,
                'data' => date('dmY'),
                'award' => "C4 Speed Up Roleta Diaria"
            ]);

            if ($rol) {
                User::where('player_id', '=', Auth::user()->player_id)->update([
                    'money' => Auth::user()->money + 75000
                ]);
            }
        } else if ($random == 2 && $mt > 25 && $mt < 30) {
            $rol = RouletteHistory::create([
                'player_id' => Auth::user()->player_id,
                'random' => $random,
                'degrees' => 240,
                'data' => date('dmY'),
                'award' => "7 Dias VIP BASIC Roleta Diaria"
            ]);
            
            // vip dar
            // if ($rol) {
            //     if (Auth::user()->pc_cafe == 0) {
            //         $date = new DateTime(date('Ymd'));
            //         $date->add(new DateInterval('P7D'));
            //         $final = $date->format('Ymd');

            //         PCCafe::create([
            //             'playerid' => Auth::user()->player_id,
            //             'inicio' => date('Ymd'),
            //             'fim' => $final
            //         ]);

            //         User::where('player_id', '=', Auth::user()->player_id)->update([
            //             'pc_cafe' => 1,
            //             'end_vip' => $final
            //         ]);
            //     } else {
            //         $data = PCCafe::where('playerid', '=', Auth::user()->player_id)->first();
            //         $date = new DateTime(date($data->fim));
            //         $date->add(new DateInterval('P7D'));
            //         $final = $date->format('Ymd');

            //         PCCafe::where('playerid', '=', Auth::user()->player_id)->update([
            //             'fim' => $final
            //         ]);
            //         User::where('player_id', '=', Auth::user()->player_id)->update([
            //             'end_vip' => $final
            //         ]);
            //     }
            // }

        } else if ($random == 3 && $mt == 31) {

            $rol = RouletteHistory::create([
                'player_id' => Auth::user()->player_id,
                'random' => $random,
                'degrees' => 200,
                'data' => date('dmY'),
                'award' => "150 Tokens Vermelhos Roleta Diaria"
            ]);
            if ($rol) {
                User::where('player_id', '=', Auth::user()->player_id)->update([
                    'coins_gold' => Auth::user()->coins_gold + 150
                ]);
            }
        } else if ($random == 4) {
            $rol = RouletteHistory::create([
                'player_id' => Auth::user()->player_id,
                'random' => $random,
                'degrees' => 200,
                'data' => date('dmY'),
                'award' => "AUG A3 ES Roleta Diaria"
            ]);
            //premio item

            // if ($rol) {
            //     $arma = armas_jogadores::where('owner_id', Auth::user()->player_id)->where('item_id', '=', "100003063")->where('equip', '=', 1)->count();
            //     if ($arma != 0) {
            //         $e = armas_jogadores::where('owner_id', Auth::user()->player_id)
            //             ->where('item_id', '=', "100003063")
            //             ->where('equip', '=', 1)->first();
            //         $arma = armas_jogadores::where('owner_id', Auth::user()->player_id)
            //             ->where('item_id', '=', "100003063")
            //             ->where('equip', '=', 1)->update([
            //                 'count' => intval($e->count) + 2592000
            //             ]);
            //     } else {
            //         armas_jogadores::create([
            //             'owner_id' => Auth::user()->player_id,
            //             'item_id' => "100003063",
            //             'item_name' => "AUG A3 ES Roleta Diaria",
            //             'count' => "2592000",
            //             'category' => "2",
            //             'equip' => 1
            //         ]);
            //     }
            // }

        } else if ($random == 5) {
            $rol = RouletteHistory::create([
                'player_id' => Auth::user()->player_id,
                'random' => $random,
                'degrees' => 60,
                'data' => date('dmY'),
                'award' => "25.000 de Cash Roleta Diaria"
            ]);
            if ($rol) {
                User::where('player_id', '=', Auth::user()->player_id)->update([
                    'money' => Auth::user()->money + 25000
                ]);
            }
        } else if ($random == 6 && $mt > 40 && $mt < 43) {
            $rol = RouletteHistory::create([
                'player_id' => Auth::user()->player_id,
                'random' => $random,
                'degrees' => 240,
                'data' => date('dmY'),
                'award' => "1 Dia VIP PLUS Roleta Diaria"
            ]);

            // if ($rol) {
            //     if (Auth::user()->pc_cafe == 0) {
            //         $date = new DateTime(date('Ymd'));
            //         $date->add(new DateInterval('P1D'));
            //         $final = $date->format('Ymd');

            //         PCCafe::create([
            //             'playerid' => Auth::user()->player_id,
            //             'inicio' => date('Ymd'),
            //             'fim' => $final
            //         ]);

            //         User::where('player_id', '=', Auth::user()->player_id)->update([
            //             'pc_cafe' => 2,
            //             'end_vip' => $final
            //         ]);
            //     } else {
            //         $data = PCCafe::where('playerid', '=', Auth::user()->player_id)->first();
            //         $date = new DateTime(date($data->fim));
            //         $date->add(new DateInterval('P1D'));
            //         $final = $date->format('Ymd');

            //         PCCafe::where('playerid', '=', Auth::user()->player_id)->update([
            //             'fim' => $final
            //         ]);
            //         User::where('player_id', '=', Auth::user()->player_id)->update([
            //             'end_vip' => $final
            //         ]);
            //     }
            // }

        } else if ($random == 7) {
            $rol = RouletteHistory::create([
                'player_id' => Auth::user()->player_id,
                'random' => $random,
                'degrees' => 60,
                'data' => date('dmY'),
                'award' => "+500 Kills Roleta Diaria"
            ]);
            if ($rol) {
                User::where('player_id', '=', Auth::user()->player_id)->update([
                    'totalkills_count' => Auth::user()->totalkills_count + 500,
                    'kills_count' => Auth::user()->kills_count + 500
                ]);
            }
        } else {
            $rol = RouletteHistory::create([
                'player_id' => Auth::user()->player_id,
                'random' => 8,
                'degrees' => 0,
                'data' => date('dmY'),
                'award' => "15.000 de Cash Roleta Diaria"
            ]);
            if ($rol) {
                User::where('player_id', '=', Auth::user()->player_id)->update([
                    'money' => Auth::user()->money + 15000
                ]);
            }
            $random = 8;
        }
        return $random;
    }

    public function receiveRoulette(Request $request)
    {
        $roleta = RouletteHistory::where('player_id', Auth::user()->player_id)->where('data', '=', date('dmY'))->orderby('id', 'desc')->get();
        foreach ($roleta as $rol) {
            return "Parabéns! Você ganhou " . $rol->award;
        }
    }
}
