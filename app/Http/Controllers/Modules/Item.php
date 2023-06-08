<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use DateTime;

//use Illuminate\Http\Request;

class Item extends Controller
{

    public function countDayItem($count)
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

    public function convertDays($count)
    {
        return $count * 24 * 3600;
    }

    public function convertSeconds($seconds)
    {
        $dtF = new DateTime('@0');
        $dtT = new DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%a');
    }

    public function renameItem($item)
    {
        return str_replace('_', ' ', $item);
    }

    public function slot($type)
    {
        switch ($type) {
            case 1:
                return 'Arma';
            case 2:
                return 'Personagem';
            case 3:
                return 'Item';
        }
    }

    public function tagBadge($type)
    {
        switch ($type) {
            case 1:
                return '<span class="badge badge-pill badge-danger">NOVO</span>';
            case 2:
                return '<span class="badge badge-pill badge-primary">PROMOÇÃO</span>';
            case 3:
                return '<span class="badge badge-pill badge-info">RECOMENDADO</span>';
            case 4:
                return '<span class="badge badge-pill badge-success">EVENTO</span>';
        }
    }

    public function tagName($type)
    {
        switch ($type) {
            case 1:
                return 'Novo';
            case 2:
                return 'Promoção';
            case 3:
                return 'Recomendado';
            case 4:
                return 'Evento';
        }
    }

    public function ownItem($equip)
    {
        switch ($equip) {
            case 0:
                return '<span class="badge badge-pill badge-danger" title="Não Possui">NÃO POSSUI</span>';
            case 1:
                return '<span class="badge badge-pill badge-success" title="POSSUI">POSSUI</span>';
                // case 2:
                //     return '<span class="badge badge-pill badge-danger" title="Em Uso">EM USO</span>';
                // case 3:
                //     return '<span class="badge badge-pill badge-warning" title="Permanente">PERMANENTE</span>';
        }
    }
}
