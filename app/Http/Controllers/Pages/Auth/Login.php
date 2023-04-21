<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Modules\Hmac;
use App\Http\Controllers\Modules\Toast;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $login, $password;
    private $hash;

    public function __construct()
    {
        $this->hash = new Hmac;
    }

    public function rules(): array
    {
        return [
            'login' => 'required|max:16|min:5|exists:accounts,login|regex:/(^[a-za-z0-9 ]+$)+/',
            'password' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/',
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => 'El usuario debe ser llenado.',
            'login.min' => 'El usuario debe tener al menos :min caracteres.',
            'login.max' => 'El usuario solo puede tener un máximo de :max caracteres.',
            'login.exists' => 'Usuario no válido o no existe.',
            'login.regex' => 'El usuario solo puede tener letras minúsculas.',
            'password.required' => 'La contraseña debe ser completada.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.max' => 'La contraseña solo puede tener un máximo de :max caracteres.',
            'password.regex' => 'La contraseña solo puede tener letras minúsculas.' 
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function loginProccess()
    {
        $validatedData = $this->validate();
        $player = Account::query()->where('login', $validatedData['login'])->firstOrFail();
        if ($this->hash->hmac($validatedData['password']) === $player->password) {
            if ($player->access_level >= 0) {
                Auth::loginUsingId($player->player_id);
                return redirect('/')->with('message', Toast::Alert(["msg" => "Bienvenido ".$player->login, "type" => "success"]));
            } else {
                $this->addError('login', 'Su cuenta está bloqueada.');
            }
        } else {
            $this->addError('password', 'Tu contraseña es incorrecta.');
        }
    }

    public function render()
    {
        return view('pages.auth.login')->layout('components.layouts.auth.auth', [
            'title' => 'Login'
        ]);
    }
}
