<?php

namespace App\Http\Controllers\Pages\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\WebshopItens;
//use Illuminate\Http\Request;

class Index extends Controller
{
    public function indexAdminPage()
    {
        return view('pages.admin.index', [
            'onlines' => Account::where('online', true)->count(),
            'bans' => Account::where('access_level', -1)->count(),
            'itens' => WebshopItens::where('state', true)->count(),
            'all' => Account::count()
        ]);
    }
}
