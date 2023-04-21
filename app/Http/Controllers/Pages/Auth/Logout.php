<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Toast;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;

class Logout extends Controller
{
    public function logoutProccess()
    {
        Auth::logout();
        return redirect('/')->with('message', Toast::Alert(["msg" => "¡Has sido desconectado!", "type" => "success"]));
    }
}
