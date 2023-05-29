<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Modules\Message;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $login, $password;

    protected $rules = [
        'login' => 'required|max:16|min:5|exists:accounts,login|regex:/(^[a-za-z0-9 ]+$)+/',
        'password' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/'
    ];

    protected $messages = [
        'login.required' => 'O usuário precisa ser preenchido.',
        'login.min' => 'O usuário precisa ter no mínimo :min caracteres.',
        'login.max' => 'O usuário só pode ter no máximo :max caracteres.',
        'login.exists' => 'Usuário inválido ou não existe.',
        'login.regex' => 'O usuário só pode ter letras minúsculas.',
        'password.required' => 'A senha precisa ser preenchido.',
        'password.min' => 'A senha precisa ter no mínimo :min caracteres.',
        'password.max' => 'A senha só pode ter no máximo :max caracteres.',
        'password.regex' => 'A senha só pode ter letras minúsculas.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function loginProccess()
    {
        $validatedData = $this->validate();
        $player = Account::where('login', $validatedData['login'])->firstOrFail();
        if ($this->hash->md5($validatedData['password']) === $player->password) {
            if ($player->access_level >= 0) {
                Auth::loginUsingId($player->player_id);
                return redirect()->route('indexPage')->with('message', Message::sendAlert(["msg" => "Bem vindo soldado $player->login!", "type" => "success"]));
            } else {
                $this->addError('login', 'Sua conta está bloqueada.');
            }
        } else {
            $this->addError('password', 'Sua senha está incorreta.');
        }
    }

    public function render()
    {
        //dd($this->hash->md5('cddancddan'));
        return view('pages.auth.login');
    }
}
