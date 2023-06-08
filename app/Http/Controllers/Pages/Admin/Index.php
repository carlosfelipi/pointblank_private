<?php

namespace App\Http\Controllers\Pages\Admin;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class Index extends Controller
{
    public function indexAdminPage()
    {
        return view('pages.admin.index');
    }
}
