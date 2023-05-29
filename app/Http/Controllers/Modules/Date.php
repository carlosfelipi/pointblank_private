<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class Date extends Controller
{
    public static function month($date)
    {
        switch ($date) {
            case '01':
                return 'de Janeiro';
            case '02':
                return 'de Fevereiro';
            case '03':
                return 'de Março';
            case '04':
                return 'de Abril';
            case '05':
                return 'de Maio';
            case '06':
                return 'de Junho';
            case '07':
                return 'de Julho';
            case '08':
                return 'de Agosto';
            case '09':
                return 'de Setembro';
            case '10':
                return 'de Outubro';
            case '11':
                return 'de Novembro';
            case '12':
                return 'de Dezembro';
        }
    }

    public function fixDate($str, $pos, $c)
    {
        return substr($str, 0, $pos) . $c . substr($str, $pos);
    }

    public function lastLogin($date)
    {
        $date = date('YmdHi', strtotime($this->fixDate($this->fixDate($this->fixDate($this->fixDate($date, 8, ':'), 6, ' '), 4, '-'), 2, '-')));
        $d = date("d", strtotime($date));
        $m = date("m", strtotime($date));
        $y = date("Y", strtotime($date));
        $h = date("H", strtotime($date));
        $i = date("i", strtotime($date));
        return 'Ùltimo Login: ' . $d . ' de ' . $this->month($m) . ' de ' . $y . ' ás ' . $h . ':' . $i . ' /';
    }

    public function created($date)
    {
        $d = date("d", strtotime($date));
        $m = date("m", strtotime($date));
        $y = date("Y", strtotime($date));
        $h = date("H", strtotime($date));
        $i = date("i", strtotime($date));
        return 'Membro desde:' . $d . ' de ' . $this->month($m) . ' de ' . $y . ' ás ' . $h . ':' . $i . '';
    }

    public function dateBlog($date)
    {
        $d = date("d", strtotime($date));
        $m = date("m", strtotime($date));
        $y = date("Y", strtotime($date));
        return $d . ' de ' . $this->month($m) . ' de ' . $y;
    }
    
}
