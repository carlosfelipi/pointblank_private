<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Modules\Message;
use App\Http\Controllers\Modules\Hash;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Login extends Component
{

    public $login,$password;

    public bool $showPassword = false;

    private Hash $hash;

    public function __construct()
    {
        $this->hash = new Hash();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }

    private function isPasswordValid($password, $hashedPassword)
    {
        return $this->hash->md5($password) === $hashedPassword;
    }

    public function loginProcess()
    {
        $validatedData = $this->validate();
        $player = Account::where('login', $validatedData['login'])->first();
        if ($this->isPasswordValid($validatedData['password'], $player->password)) {
            Auth::loginUsingId($player->player_id);
            $greeting = Message::getGreeting();
            return redirect()->route('indexPage')->with('message', Message::sendAlert(["msg" => "$greeting, {$player->login}! Bem-vindo de volta!", "type" => "success"]));
        } else {
            $this->addError('password', 'Senha incorreta. Verifique sua senha e tente novamente.');
        }
    }

    protected function rules()
    {
        return [
            'login' => ['required', 'string', 'max:16', 'min:5', 'exists:accounts,login', 'regex:/(^[a-za-z0-9 ]+$)+/'],
            'password' => ['required', 'string', 'max:16', 'min:5', 'regex:/(^[a-za-z0-9 ]+$)+/']
        ];
    }

    protected function messages()
    {
        return [
            'login.required' => 'O campo de usuário é obrigatório.',
            'login.string' => 'O campo de usuário deve ser uma string.',
            'login.max' => 'O usuário deve ter no máximo :max caracteres.',
            'login.min' => 'O usuário deve ter no mínimo :min caracteres.',
            'login.exists' => 'O usuário informado não existe.',
            'login.regex' => 'O usuário só pode conter letras minúsculas, números e espaços.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.string' => 'O campo de senha deve ser uma string.',
            'password.max' => 'A senha deve ter no máximo :max caracteres.',
            'password.min' => 'A senha deve ter no mínimo :min caracteres.',
            'password.regex' => 'A senha só pode conter letras minúsculas, números e espaços.'
        ];
    }

    public function render()
    {
        return view('pages.auth.login');
    }
}
