<?php

namespace App\Http\Controllers\Pages\Player;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Item;
use App\Models\Account;
use App\Models\PItens;
use App\Models\RouletteHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Roulette extends Controller
{
    private $item;

    public function roulettePage()
    {
        return view('pages.player.roulette');
    }

    public function __construct()
    {
        $this->item = new Item();
    }

    public function spinRoulette()
    {
        $player = Account::find(Auth::user()->player_id);
        $history = RouletteHistory::where('player_id', $player->player_id)->where('data', '=', date('dmY'))->count();

        if ($history != 0) {
            return 10;
        }

        $random = rand(0, 7);

        if ($random == 0) {
            $rol = RouletteHistory::create([
                'player_id' => $player->player_id,
                'random' => $random,
                'degrees' => 320,
                'data' => date('dmY'),
                'award' => "Você ganhou uma P90 Mil Grau por 30 dias!"
            ]);
            if ($rol) {
                $pItems = PItens::where('item_id', '200004602')->where('owner_id', $player->player_id)->first();
                if ($pItems) {
                    $pItems->increment('count', $this->item->convertDays('30'));
                } else {
                    PItens::insert([
                        'owner_id' => $player->player_id,
                        'item_id' => '200004602',
                        'item_name' => 'P90 Mil Grau (Roleta)',
                        'count' => $this->item->convertDays('30'),
                        'category' => 1,
                        'equip' => 1
                    ]);
                }
            }
        } else if ($random == 1) {
            $rol = RouletteHistory::create([
                'player_id' => $player->player_id,
                'random' => $random,
                'degrees' => 280,
                'data' => date('dmY'),
                'award' => "Você ganhou 10.000 de cash!"
            ]);
            if ($rol) {
                $player->increment('money', '10000');
            }
        } else if ($random == 2) {
            $rol = RouletteHistory::create([
                'player_id' => $player->player_id,
                'random' => $random,
                'degrees' => 240,
                'data' => date('dmY'),
                'award' => "Você ganhou uma Aug Cupido por 30 dias!"
            ]);
            if ($rol) {
                $pItems = PItens::where('item_id', '100003250')->where('owner_id', $player->player_id)->first();
                if ($pItems) {
                    $pItems->increment('count', $this->item->convertDays('30'));
                } else {
                    PItens::insert([
                        'owner_id' => $player->player_id,
                        'item_id' => '100003250',
                        'item_name' => 'Aug Cupido (Roleta)',
                        'count' => $this->item->convertDays('30'),
                        'category' => 1,
                        'equip' => 1
                    ]);
                }
            }
        } else if ($random == 3) {
            $rol = RouletteHistory::create([
                'player_id' => $player->player_id,
                'random' => $random,
                'degrees' => 200,
                'data' => date('dmY'),
                'award' => "Você ganhou uma SC-2010 Medical por 30 dias!"
            ]);
            if ($rol) {
                $pItems = PItens::where('item_id', '100003226')->where('owner_id', $player->player_id)->first();
                if ($pItems) {
                    $pItems->increment('count', $this->item->convertDays('30'));
                } else {
                    PItens::insert([
                        'owner_id' => $player->player_id,
                        'item_id' => '100003226',
                        'item_name' => 'SC-2010 Medical (Roleta)',
                        'count' => $this->item->convertDays('30'),
                        'category' => 1,
                        'equip' => 1
                    ]);
                }
            }
        } else if ($random == 4) {
            $rol = RouletteHistory::create([
                'player_id' => $player->player_id,
                'random' => $random,
                'degrees' => 200,
                'data' => date('dmY'),
                'award' => "Você ganhou uma Kriss Nusantara por 30 dias!"
            ]);
            if ($rol) {
                $pItems = PItens::where('item_id', '200004578')->where('owner_id', $player->player_id)->first();
                if ($pItems) {
                    $pItems->increment('count', $this->item->convertDays('30'));
                } else {
                    PItens::insert([
                        'owner_id' => $player->player_id,
                        'item_id' => '200004578',
                        'item_name' => 'Kriss Nusantara (Roleta)',
                        'count' => $this->item->convertDays('30'),
                        'category' => 1,
                        'equip' => 1
                    ]);
                }
            }
        } else if ($random == 5) {
            $rol = RouletteHistory::create([
                'player_id' => $player->player_id,
                'random' => $random,
                'degrees' => 60,
                'data' => date('dmY'),
                'award' => "Você ganhou 7.500 de coins!"
            ]);
            if ($rol) {
                $player->increment('coin', '7500');
            }
        } else if ($random == 6) {
            $rol = RouletteHistory::create([
                'player_id' => $player->player_id,
                'random' => $random,
                'degrees' => 240,
                'data' => date('dmY'),
                'award' => "Você ganhou uma OA-93 Arcade por 30 dias!"
            ]);
            if ($rol) {
                $pItems = PItens::where('item_id', '200004641')->where('owner_id', $player->player_id)->first();
                if ($pItems) {
                    $pItems->increment('count', $this->item->convertDays('30'));
                } else {
                    PItens::insert([
                        'owner_id' => $player->player_id,
                        'item_id' => '200004641',
                        'item_name' => 'OA-93 Arcade (Roleta)',
                        'count' => $this->item->convertDays('30'),
                        'category' => 1,
                        'equip' => 1
                    ]);
                }
            }
        } else if ($random == 7) {
            $rol = RouletteHistory::create([
                'player_id' => $player->player_id,
                'random' => $random,
                'degrees' => 60,
                'data' => date('dmY'),
                'award' => "Você deu azar, volte amanhã soldado!"
            ]);
        } else {
            $rol = RouletteHistory::create([
                'player_id' => $player->player_id,
                'random' => 8,
                'degrees' => 0,
                'data' => date('dmY'),
                'award' => "Você deu azar, volte amanhã soldado!"
            ]);
            $random = 8;
        }
        return $random;
    }

    public function receiveRoulette(Request $request)
    {
        $roleta = RouletteHistory::where('player_id', Auth::user()->player_id)->where('data', '=', date('dmY'))->orderby('id', 'desc')->get();
        foreach ($roleta as $rol) {
            return  $rol->award;
        }
    }
}
