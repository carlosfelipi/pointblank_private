<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Message;
use Illuminate\Support\Facades\Auth;

/**
 * Classe responsável por lidar com o processo de logout do usuário.
 */
class Logout extends Controller
{
 
    public function logout()
    {
        $userName = Auth::user()->player_name ?: Auth::user()->login;
        Auth::logout();

        $message = Message::sendAlert([
            "msg" => "Até logo, $userName! Você foi desconectado com sucesso.",
            "type" => "success"
        ]);

        return redirect('/')->with('message', $message);
    }
}
