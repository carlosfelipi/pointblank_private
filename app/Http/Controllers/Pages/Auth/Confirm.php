<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Config;
use App\Models\Temporary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Confirm extends Controller
{
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
                'money' => $config->money,
                'created_at' => Carbon::now()
            ]);
            if ($account->save()) {
                Auth::loginUsingId($account->player_id);
                $temporary->delete();
                return redirect()->route('indexPage')->withToastSuccess('Bienvenido ' . $account->login);
            } else {
                return redirect()->route('indexPage')->withToastError('Ocurrió un error, inténtalo de nuevo más tarde.');
            }
        } else {
            return redirect()->route('indexPage')->withToastError('¡El token ha sido modificado o no existe!');
        }
    }
}
