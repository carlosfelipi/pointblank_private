<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;

class Patent extends Controller
{
    public static function namePlayerPt($rank) //PT-BR
    {
        switch ($rank) {
            case 0:
                return "Novato";

            case 1:
                return "Recruta";

            case 2:
                return "Soldado";

            case 3:
                return "Cabo";

            case 4:
                return "Sargento";

            case 5:
                return "Terceiro Sargento 1";

            case 6:
                return "Terceiro Sargento 2";

            case 7:
                return "Terceiro Sargento 3";

            case 8:
                return "Segundo Sargento 1";

            case 9:
                return "Segundo Sargento 2";

            case 10:
                return "Segundo Sargento 3";

            case 11:
                return "Segundo Sargento 4";

            case 12:
                return "Primeiro Sargento 1";

            case 13:
                return "Primeiro Sargento 2";

            case 14:
                return "Primeiro Sargento 3";

            case 15:
                return "Primeiro Sargento 4";

            case 16:
                return "Primeiro Sargento 5";

            case 17:
                return "Segundo Tenente 1";

            case 18:
                return "Segundo Tenente 2";

            case 19:
                return "Segundo Tenente 3";

            case 20:
                return "Segundo Tenente 4";

            case 21:
                return "Primeiro Tenente 1";

            case 22:
                return "Primeiro Tenente 2";

            case 23:
                return "Primeiro Tenente 3";

            case 24:
                return "Primeiro Tenente 4";

            case 25:
                return "Primeiro Tenente 5";

            case 26:
                return "Capitão 1";

            case 27:
                return "Capitão 2";

            case 28:
                return "Capitão 3";

            case 29:
                return "Capitão 4";

            case 30:
                return "Capitão 5";

            case 31:
                return "Major 1";

            case 32:
                return "Major 2";

            case 33:
                return "Major 3";

            case 34:
                return "Major 4";

            case 35:
                return "Major 5";

            case 36:
                return "Tenente Coronel 1";

            case 37:
                return "Tenente Coronel 2";

            case 38:
                return "Tenente Coronel 3";

            case 39:
                return "Tenente Coronel 4";

            case 40:
                return "Tenente Coronel 5";

            case 41:
                return "Coronel 1";

            case 42:
                return "Coronel 2";

            case 43:
                return "Coronel 3";

            case 44:
                return "Coronel 4";

            case 45:
                return "Coronel 5";

            case 46:
                return "General de Brigada";

            case 47:
                return "General de Divisão";

            case 48:
                return "General de Exército";

            case 49:
                return "Marechal";

            case 50:
                return "Herói de Guerra";

            case 51:
                return "Hero";

            case 53:
                return "Game Master";

            case 54:
                return "Game Master";
        }
    }

    public static function nameClaPt($rank) //PT-BR
    {
        switch ($rank) {
            case 0:
                return "Novato";
            case 1:
                return "Estagiario";
            case 2:
                return "Estagiario |";
            case 3:
                return "Amador";
            case 4:
                return "Suporte";
            case 5:
                return "Suporte |";
            case 6:
                return "Suporte |||";
            case 7:
                return "Exelente";
            case 8:
                return "Exelente |";
            case 9:
                return "Exelente ||";
            case 10:
                return "Exelente ||| ";
            case 11:
                return "Superior ";
            case 12:
                return "Superior |";
            case 13:
                return "Superior ||";
            case 14:
                return "Superior ||| ";
            case 15:
                return "Forças Especiais";
            case 16:
                return "Forças Especiais |";
            case 17:
                return "Forças Especiais ||";
            case 18:
                return "Forças Especiais |||";
            case 19:
                return "Forças Especiais ||||";
            case 20:
                return "Assalto ";
            case 21:
                return "Assalto |";
            case 22:
                return "Assalto ||";
            case 23:
                return "Assalto |||";
            case 24:
                return "Assalto |||| ";
            case 25:
                return "Comando Especial";
            case 26:
                return "Comando Especial |";
            case 27:
                return "Comando Especial ||";
            case 28:
                return "Comando Especial |||";
            case 29:
                return "Comando Especial ||||";
            case 30:
                return "Superiores Master";
            case 31:
                return "Superiores Master |";
            case 32:
                return "Superiores Master ||";
            case 33:
                return "Superiores Master |||";
            case 34:
                return "Superiores Master |||| ";
            case 35:
                return "Divisao De Comando";
            case 36:
                return "Divisao de Comando |";
            case 37:
                return "Divisao de Comando ||";
            case 38:
                return "Divisao de Comando |||";
            case 39:
                return "Divisao de Comando |||| ";
            case 40:
                return "Corps Especiais";
            case 41:
                return "Corps Especiais |";
            case 42:
                return "Corps Especiais ||";
            case 43:
                return "Corps Especiais |||";
            case 44:
                return "Corps Especiais ||||";
            case 45:
                return "Divisao Master X";
            case 46:
                return "Divisao Master Y";
            case 47:
                return "Divisao Master W";
            case 48:
                return "Divisao Master Z ";
        }
    }

    public static function namePlayerEn($rank) //EN
    {
        switch ($rank) {
            case 0:
                return 'Trainee';
            case 1:
                return 'Senior Trainee';
            case 2:
                return 'Private';
            case 3:
                return 'Corporal';
            case 4:
                return 'Sergeant';
            case 5:
                return 'Sergeant Grade 1';
            case 6:
                return 'Sergeant Grade 2';
            case 7:
                return 'Sergeant Grade 3';
            case 8:
                return 'Sergeant 1st Class Grade 1';
            case 9:
                return 'Sergeant 1st Class Grade 2';
            case 10:
                return 'Sergeant 1st Class Grade 3';
            case 11:
                return 'Sergeant 1st Class Grade 4';
            case 12:
                return 'Master Sergeant Grade 1';
            case 13:
                return 'Master Sergeant Grade 2';
            case 14:
                return 'Master Sergeant Grade 3';
            case 15:
                return 'Master Sergeant Grade 4';
            case 16:
                return 'Master Sergeant Grade 5';
            case 17:
                return '2nd lieutenant Grade 1';
            case 18:
                return '2nd lieutenant Grade 2';
            case 19:
                return '2nd lieutenant Grade 3';
            case 20:
                return '2nd lieutenant Grade 4';
            case 21:
                return '1st lieutenant Grade 1';
            case 22:
                return '1st lieutenant Grade 2';
            case 23:
                return '1st lieutenant Grade 3';
            case 24:
                return '1st lieutenant Grade 4';
            case 25:
                return '1st lieutenant Grade 5';
            case 26:
                return 'Captian Grade 1';
            case 27:
                return 'Captian Grade 2';
            case 28:
                return 'Captian Grade 3';
            case 29:
                return 'Captian Grade 4';
            case 30:
                return 'Captian Grade 5';
            case 31:
                return 'Major Grade 1';
            case 32:
                return 'Major Grade 2';
            case 33:
                return 'Major Grade 3';
            case 34:
                return 'Major Grade 4';
            case 35:
                return 'Major Grade 5';
            case 36:
                return 'Lt Colonel Grade 1';
            case 37:
                return 'Lt Colonel Grade 2';
            case 38:
                return 'Lt Colonel Grade 3';
            case 39:
                return 'Lt Colonel Grade 4';
            case 40:
                return 'Lt Colonel Grade 5';
            case 41:
                return 'Colonel Grade 1';
            case 42:
                return 'Colonel Grade 2';
            case 43:
                return 'Colonel Grade 3';
            case 44:
                return 'Colonel Grade 4';
            case 45:
                return 'Colonel Grade 5';
            case 46:
                return 'Brigade';
            case 47:
                return 'Major General';
            case 48:
                return 'Lt General';
            case 49:
                return 'General';
            case 50:
                return 'Commander';
            case 51:
                return 'Hero';
        }
    }

    public static function nameClaEn($rank) //EN
    {
        switch ($rank) {
            case 0:
                return "Newbie";

            case 1:
                return "Trainee";

            case 2:
                return "Trainee";

            case 3:
                return "Novice";

            case 4:
                return "Novice";

            case 5:
                return "Support";

            case 6:
                return "Support";

            case 7:
                return "Support";

            case 8:
                return "Excellent";

            case 9:
                return "Excellent";

            case 10:
                return "Excellent";

            case 11:
                return "Blackfoot";

            case 12:
                return "Blackfoot";

            case 13:
                return "Blackfoot";

            case 14:
                return "Spearhead";

            case 15:
                return "Spearhead";

            case 16:
                return "Spearhead";

            case 17:
                return "Spearhead";

            case 18:
                return "Spearhead";

            case 19:
                return "Recon Regiment";

            case 20:
                return "Recon Regiment";

            case 21:
                return "Recon Platoon";

            case 22:
                return "Recon Platoon";

            case 23:
                return "Commando Squad";

            case 24:
                return "Commando Squad";

            case 25:
                return "Commando Platoon";

            case 26:
                return "Commando Platoon";

            case 27:
                return "Commando Battalion";

            case 28:
                return "Commando Battalion";

            case 29:
                return "Commando Company";

            case 30:
                return "Commando Company";

            case 31:
                return "Commando Regiment";

            case 32:
                return "Commando Regiment";

            case 33:
                return "Commando Brigade";

            case 34:
                return "Commando Brigade";

            case 35:
                return "SpecOps Company";

            case 36:
                return "SpecOps Company";

            case 37:
                return "SpecOps Regiment";

            case 38:
                return "SpecOps Regiment";

            case 39:
                return "SpecOps Brigade";

            case 40:
                return "SpecOps Brigade";

            case 41:
                return "SpecOps Platoon";

            case 42:
                return "SpecOps Platoon";

            case 43:
                return "BlackOps Regiment";

            case 44:
                return "BlackOps Regiment";

            case 45:
                return "BlackOps Platoon";

            case 46:
                return "BlackOps Platoon";

            case 47:
                return "BlackOps Brigade";

            case 48:
                return "BlackOps Brigade";

            case 49:
                return "BlackOps Squad";

            case 50:
                return "BlackOps Regiment ";
        }
    }
}
