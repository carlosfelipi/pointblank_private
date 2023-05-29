<?php

namespace App\Http\Controllers\Pages\Auth\Social;

use App\Http\Controllers\Modules\Message;
use App\Models\Account;
use App\Models\AccountSocialite;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Complete extends Component
{

    public $login, $password, $confirmation, $term, $token;

    protected $queryString = ['token'];

    protected $rules = [
        'login' => 'required|max:16|min:5|unique:accounts,login|unique:accounts_temporary,login|regex:/(^[a-za-z0-9 ]+$)+/',
        'password' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/',
        'confirmation' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/|same:password',
        //Token da conta registrada de algum provedor social;
        'token' => 'required|exists:accounts_socialite,token',
        'term' => 'required'
    ];

    protected $messages = [
        'login.required' => 'O usuário precisa ser preenchido.',
        'login.min' => 'O usuário precisa ter no mínimo :min caracteres.',
        'login.max' => 'O usuário só pode ter no máximo :max caracteres.',
        'login.unique' => 'Usuário já existe, tente outro.',
        'login.regex' => 'O usuário só pode ter letras minúsculas.',
        'password.required' => 'A senha precisa ser preenchido.',
        'password.min' => 'A senha precisa ter no mínimo :min caracteres.',
        'password.max' => 'A senha só pode ter no máximo :max caracteres.',
        'password.regex' => 'A senha só pode ter letras minúsculas.',
        'confirmation.required' => 'A confirmação de senha precisa ser preenchido.',
        'confirmation.min' => 'A confirmação de senha precisa ter no mínimo :min caracteres.',
        'confirmation.max' => 'A confirmação de senha só pode ter no máximo :max caracteres.',
        'confirmation.regex' => 'A confirmação de senha só pode ter letras minúsculas.',
        'confirmation.same' => 'As senhas não coincidem.',
        'token.required' => 'Token de ativação inválido,',
        'token.exists' => 'Token de ativação inválido ou expirado!',
        'term.required' => 'Concorde com os termos de uso.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function account()
    {
        return AccountSocialite::where('token', $this->token)->first();
    }

    public function completeSocialProccess()
    {
        $validatedData = $this->validate();
        $account = new Account([
            'login' => $validatedData['login'],
            'password' => $this->hash->md5($validatedData['password']),
            'email' => $this->account()->provider_email,
            'gp' => (int)env('GOLD_INITIAL'),
            'money' =>  (int)env('CASH_INITIAL'),
            'access_admin' => false,
            'provider' => $this->account()->provider,
            'created_at' => Carbon::now()
        ]);
        if ($account->save()) {
            Auth::loginUsingId($account->player_id);
            $this->account()->delete();
            Message::sendMessageBoxPlayer([
                'player' => $account->player_id,
                'message' => 'Bem vindo(a) ' . env('APP_NAME') . ', faça parte de nossa comunidade (' . env('DISCORD_URL') . ').'
            ]);
            return redirect()->route('indexPage')->with('message', Message::sendAlert(["msg" => "Bem vindo soldado $account->login!", "type" => "success"]));
        }
        return redirect()->route('indexPage')->with('message', Message::sendAlert(["msg" => "Ocorreu um erro,tente novamente mais tarde.", "type" => "error"]));
    }

    public function render()
    {
        //dd($this->token);
        return view('pages.auth.social.complete');
    }
}
