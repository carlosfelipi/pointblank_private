<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;

class Access extends Controller
{
    public function levelPlayer($level)
    {
        switch ($level) {
            case -1:
                return 'Banido';
            case 0:
                return 'Jogador';
            case 1:
                return 'Suporte';
            case 2:
                return 'Ajudante';
            case 3:
                return 'Moderador';
            case 4:
                return 'Game Master';
            case 5:
                return 'Administrador';
            case 6:
                return 'Fundador';
            default:
                return 'Desconhecido';
        }
    }
}
