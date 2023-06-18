<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Message;
use App\Http\Controllers\Modules\Title;
use App\Models\Account;
use App\Models\Temporary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class ConfirmEmail extends Controller
{
   
    public function confirmProccess(Request $request)
    {
        try {
            DB::beginTransaction();
            $temporary = Temporary::where('token', $request->token)->firstOrFail();
            $account = Account::create([
                'login' => $temporary->login,
                'password' => $temporary->password,
                'email' => $temporary->email,
                'gp' => (int) env('GOLD_INITIAL'),
                'money' => (int) env('CASH_INITIAL'),
                'access_admin' => false,
                'created_at' => Carbon::now()
            ]);
            Auth::loginUsingId($account->player_id);
            $temporary->delete();
            Message::sendMessageBoxPlayer([
                'player' => $account->player_id,
                'message' => 'Bem vindo(a) ' . env('APP_NAME') . ', faça parte de nossa comunidade (' . env('DISCORD_URL') . ').'
            ]);
            Title::sendTitlesToPlayer($account->player_id);
            DB::commit();
            return redirect()->route('indexPage')->with('message', Message::sendAlert([
                'msg' => "Bem vindo soldado {$account->login}!",
                'type' => 'success'
            ]));
        } catch (ModelNotFoundException $exception) {
            DB::rollBack();
            return redirect()->route('registerPage')->with('message', Message::sendAlert([
                'msg' => 'Token foi modificado ou não existe!',
                'type' => 'error'
            ]));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('indexPage')->with('message', Message::sendAlert([
                'msg' => 'Ocorreu um erro, tente novamente mais tarde.',
                'type' => 'error'
            ]));
        }
    }
}
