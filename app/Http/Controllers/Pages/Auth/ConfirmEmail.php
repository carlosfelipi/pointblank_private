<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Message;
use App\Models\Account;
use App\Models\Temporary;
use Carbon\Carbon;
//use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmEmail extends Controller
{
    public function confirmProccess(Request $request)
    {
        if (isset($request->token)) {
            $temporary = Temporary::where('token', $request->token)->firstOrFail();
            $account = new Account([
                'login' => $temporary->login,
                'password' => $temporary->password,
                'email' => $temporary->email,
                'gp' => (int)env('GOLD_INITIAL'),
                'money' =>  (int)env('CASH_INITIAL'),
                'access_admin' => false,
                'created_at' => Carbon::now()
            ]);
            if ($account->save()) {
                Auth::loginUsingId($account->player_id);
                $temporary->delete();
                Message::sendMessageBoxPlayer([
                    'player' => $account->player_id,
                    'message' => 'Bem vindo(a) ' . env('APP_NAME') . ', faça parte de nossa comunidade (' . env('DISCORD_URL') . ').'
                ]);
                return redirect()->route('indexPage')->with('message', Message::sendAlert(["msg" => "Bem vindo soldado $account->login!", "type" => "success"]));
            } else {
                return redirect()->route('indexPage')->with('message', Message::sendAlert(["msg" => "Ocorreu um erro,tente novamente mais tarde.", "type" => "error"]));
            }
        } else {
            return redirect()->route('registerPage')->with('message', Message::sendAlert(["msg" => "Token foi modificado ou não existe!", "type" => "error"]));
        }
    }
}
