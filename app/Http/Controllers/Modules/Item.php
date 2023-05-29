<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class Item extends Controller
{

    public function categoryItem($category)
    {
        switch ($category) {
            case 1:
                return 'Dia';
            case 2:
                return 'Unidade';
        }
    }

    public static function countDayItem($count)
    {
        if ($count < '86400') {
            if ($count == '1') {
                return $count . ' Unidade';
            } else {
                return number_format($count) . ' Unidades';
            }
        } else {
            if ($count / 24 / 60 / 60 == '1') {
                return $count / 24 / 60 / 60 . ' Dia';
            } else {
                return $count / 24 / 60 / 60 . ' Dias';
            }
        }
    }
}
