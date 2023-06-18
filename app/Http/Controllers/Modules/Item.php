<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Coupon\Items;
use App\Models\Shop;
use Carbon\Carbon;

class Item extends Controller
{
    public function convertDaysToSeconds($days)
    {
        return Carbon::now()->addDays($days)->diffInSeconds();
        // return array_map(fn ($d) => $d * 86400, (array) $days);
    }

    public function convertSecondsToDays($seconds)
    {
        return Carbon::now()->addSeconds($seconds)->endOfDay()->diffInDays();
        // return array_map(fn ($s) => $s / 86400, (array) $seconds);
    }

    public function addMoreSeconds($currentCount, $secondsToAdd)
    {
        return Carbon::now()->addSeconds($secondsToAdd)->toDateTimeString();
    }

    public function countDayItem($count)
    {
        if ($count < 86400) {
            return $count === 1 ? "$count Unidade" : number_format($count) . " Unidades";
        }

        $days = $this->convertSecondsToDays($count);
        return $days === 1 ? "$days Dia" : number_format($days) . " Dias";
    }

    public function countDayItemTwo($count)
    {
        if ($count < 86400) {
            return $count;
        }
        return $this->convertSecondsToDays($count);
    }

    public function renameItem($item)
    {
        return ucwords(str_replace('_', ' ', $item));
    }

    public function itemName(int $goodId)
    {
        $item = Shop::find($goodId);
        return $this->renameItem($item->item_name);
    }

    public function itemNameTwo(int $itemId)
    {
        $item = Items::find($itemId);
        return $this->renameItem($item->item_name);
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
            default:
                return 'Desconhecido';
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
            default:
                return '<span class="badge badge-pill badge-secondary">DESCONHECIDO</span>';
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
            default:
                return 'Desconhecido';
        }
    }

    public function ownItem($equip)
    {
        switch ($equip) {
            case 0:
                return '<span class="badge badge-pill badge-danger" title="Não Possui">NÃO POSSUI</span>';
            case 1:
                return '<span class="badge badge-pill badge-success" title="POSSUI">POSSUI</span>';
            case 2:
                return '<span class="badge badge-pill badge-danger" title="Em Uso">EM USO</span>';
            case 3:
                return '<span class="badge badge-pill badge-warning" title="Permanente">PERMANENTE</span>';
            default:
                return '<span class="badge badge-pill badge-secondary" title="Não Encontrado">NÃO ENCONTRADO</span>';
        }
    }

    public function typeCouponName($type)
    {
        switch ($type) {
            case 1:
                return 'gold';
            case 2:
                return 'cash';
            case 3:
                return 'coin';
            default:
                return 'desconhecido';
        }
    }
}
