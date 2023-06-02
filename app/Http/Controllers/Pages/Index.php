<?php

namespace App\Http\Controllers\Pages;

use App\Models\Account;
use App\Models\News;
use App\Models\Clan;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Patent;
use App\Http\Controllers\Modules\Ranking;
use App\Http\Controllers\Modules\Blog;
use App\Http\Controllers\Modules\Date;
use App\Http\Controllers\Modules\Item;
use App\Models\WebshopItens;

//use Illuminate\Http\Request;

class Index extends Controller
{
    public function indexPage()
    {
        return view('pages.index', [
            'players' => Account::query()->where('exp', '>=', '1000')->where('access_level', 0)->orderByDesc('exp')->limit(5)->get(),
            'clans' => Clan::query()->where('clan_exp', '>', '0')->orderByDesc('clan_exp')->limit(5)->get(),
            'news' => News::where('state', true)->orderByDesc('created_at')->limit(2)->get(),
            'itens' => WebshopItens::where('state', true)->orderByDesc('created_at')->limit(4)->get(),
            'ranking' => new Ranking(),
            'patent' => new Patent(),
            'blog' => new Blog(),
            'date' => new Date(),
            'modulesItem' => new Item()
        ]);
    }
}
