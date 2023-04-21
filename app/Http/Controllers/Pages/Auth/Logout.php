<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Http\Request;

class Logout extends Controller
{
    public function logoutProccess()
    {
        Auth::logout();
        return redirect()->route('indexPage')->withToastSuccess('¡Has sido desconectado!');
    }
}
