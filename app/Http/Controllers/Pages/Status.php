<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Account;

//use Illuminate\Http\Request;

class Status extends Controller
{
    public function statusPage()
    {
        return view('pages.status', [
            'onlines' => Account::where('online', true)->count(),
            'all' => Account::count()
        ]);
    }
}
