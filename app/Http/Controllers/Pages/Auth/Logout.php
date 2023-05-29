<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Message;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Http\Request;

class Logout extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('message', Message::sendAlert(["msg" => "Você foi desconectado!", "type" => "success"]));
    }
}
