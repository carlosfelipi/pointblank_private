<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Player\PlayerItem;
use App\Models\Player\PlayerTitles;

class Title extends Controller
{
    public static function sendTitlesToPlayer($playerId)
    {
        $items = [
            [
                'ItemId' => 1103003004,
                'ItemName' => 'Boina de Shotgun'
            ],
            [
                'ItemId' => 1103003005,
                'ItemName' => 'Boina de Pistoleiro'
            ],
            [
                'ItemId' => 1103003002,
                'ItemName' => 'Boina de SMG'
            ],
            [
                'ItemId' => 1103003003,
                'ItemName' => 'Boina dos Snipers'
            ],
            [
                'ItemId' => 1103003001,
                'ItemName' => 'Boina de Assalto'
            ]
        ];
        foreach ($items as $item) {
            PlayerItem::insert([
                'owner_id' => $playerId,
                'item_id' => $item['ItemId'],
                'item_name' => $item['ItemName'],
                'count' => 1,
                'equip' => 3,
                'category' => 2
            ]);
        }
        PlayerTitles::insert(
            [
                'owner_id' => $playerId,
                'titleequiped1' => 0,
                'titleequiped2' => 0,
                'titleequiped3' => 0,
                'titleflags' => 35184372088830,
                'titleslots' => 3
            ]
        );
    }
}
