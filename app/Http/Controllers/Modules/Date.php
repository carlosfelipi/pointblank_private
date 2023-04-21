<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;

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

    public function memberCounter($date)
    {
        $diff = time() - $date;
        $seconds = $diff;
        $minutes = round($diff / 60);
        $hours = round($diff / 3600);
        $days = round($diff / 86400);
        $weeks = round($diff / 604800);
        $months = round($diff / 2419200);
        $years = round($diff / 29030400);

        if ($seconds <= 60) {
            return "$seconds segundos";
        } elseif ($minutes <= 60) {
            return $minutes == 1 ? 'um minuto ' : $minutes . ' minutos';
        } elseif ($hours <= 24) {
            return $hours == 1 ? 'uma hora' : $hours . ' horas';
        } elseif ($days <= 7) {
            return $days == 1 ? 'um dia' : $days . ' dias';
        } elseif ($weeks <= 4) {
            return $weeks == 1 ? 'uma semana' : $weeks . ' semanas';
        } elseif ($months <= 12) {
            return $months == 1 ? 'um mês' : $months . ' meses';
        } else {
            return $years == 1 ? 'um ano' : $years . ' anos';
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

    public function CreatedClan($Date)
    {
        $D = date("d", strtotime($Date));
        $M = date("m", strtotime($Date));
        $Y = date("Y", strtotime($Date));
        return '' . $D . ' de ' . $this->month($M) . ' de ' . $Y;
    }
}
