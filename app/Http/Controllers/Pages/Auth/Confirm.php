<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Toast;
use App\Http\Controllers\Modules\Token;
use App\Models\Account;
use App\Models\Config;
use App\Models\Temporary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Confirm extends Controller
{
    private $token;

    public function __construct()
    {
        $this->token = new Token;    
    }

    public function confirmProccess(Request $request)
    {
        if (isset($request->token) && strlen($request->token) == 22) {
            $temporary = Temporary::where('token', $request->token)->firstOrFail();
            $config = Config::first();
            $account = new Account([
                'login' => $temporary->login,
                'password' => $temporary->password,
                'email' => $temporary->email,
                'gp' => $config->gp,
                'token'=> $this->token->random('22'),
                'money' => $config->money,
                'created_at' => Carbon::now()
            ]);
            if ($account->save()) {
                Auth::loginUsingId($account->player_id);
                $temporary->delete();
                return redirect('/')->with('message', Toast::Alert(["msg" => "Bienvenido ".$account->login, "type" => "success"]));
            } else {
                return redirect('/')->with('message', Toast::Alert(["msg" => "Ocurrió un error, inténtalo de nuevo más tarde.", "type" => "error"]));
            }
        } else {
            return redirect('/')->with('message', Toast::Alert(["msg" => "¡El token ha sido modificado o no existe!", "type" => "error"]));
        }
    }
}
