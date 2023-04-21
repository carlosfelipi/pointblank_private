<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Modules\Hmac;
use App\Http\Controllers\Modules\Token;
use App\Mail\Confirm\Account;
use App\Models\Ban\Email;
use App\Models\Temporary;
use Carbon\Carbon;
use Livewire\Component;
use Mail;

class Register extends Component
{
    public $login, $email, $password, $confirm, $term;

    private $hash, $token;

    public function __construct()
    {
        $this->hash = new Hmac;
        $this->token = new Token;
    }

    public function rules(): array
    {
        return [
            'login' => 'required|max:16|min:5|unique:accounts,login|unique:accounts_temporary,login|regex:/(^[a-za-z0-9 ]+$)+/',
            'email' => 'required|unique:accounts,login|unique:accounts_temporary,email|email',
            'password' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/',
            'confirm' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/|same:password',
            'term' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => 'El usuario debe ser llenado.',
            'login.min' => 'El usuario debe tener al menos :min caracteres.',
            'login.max' => 'El usuario solo puede tener un máximo de :max caracteres.',
            'login.unique' => 'El usuario ya existe, prueba con otro.',
            'login.regex' => 'El usuario solo puede tener letras minúsculas.',
            'email.required' => 'El correo electrónico debe ser completado.',
            'email.unique' => 'El correo electrónico ya está en uso, prueba con otro.',
            'email.email' => 'Formato de correo inválido.',
            'password.required' => 'La contraseña debe ser completada.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.max' => 'La contraseña solo puede tener un máximo de :max caracteres.',
            'password.regex' => 'La contraseña solo puede tener letras minúsculas.',
            'confirm.required' => 'Es necesario completar la confirmación de la contraseña.',
            'confirm.min' => 'La confirmación de la contraseña debe tener al menos :min caracteres de longitud.',
            'confirm.max' => 'La confirmación de contraseña solo puede tener un máximo de :max caracteres.',
            'confirm.regex' => 'La confirmación de la contraseña solo puede contener letras minúsculas.',
            'confirm.same' => 'Las contraseñas no coinciden.',
            'term.required' => 'Necesitas aceptar los términos de uso.'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function domain($email)
    {
        return Email::query()->where('domain', $email)->where('state', true)->first();
    }

    public function registerProccess()
    {
        $validatedData = $this->validate();
        $email = explode('@', $validatedData['email']);
        if ($this->domain($email[1])) {
            $this->addError('email', 'No aceptamos correos electrónicos temporales.');
            $this->domain($email[1])->increment('attempt', 1);
        } else {
            $temporary = new Temporary([
                'login' => $validatedData['login'],
                'password' => $this->hash->hmac($validatedData['password']),
                'email' => $validatedData['email'],
                'token' => $this->token->random('22'),
                'created_at' => Carbon::now(),
                'expired_at' => Carbon::now()->addDay('1')
            ]);
            if ($temporary->save()) {
                Mail::to($validatedData['email'])->send(new Account($temporary));
                return redirect('/')->with('toast_success', 'Revisa tu correo electrónico, te hemos enviado un enlace de activación.');
            } else {
                return redirect('/')->with('toast_success', 'Ocurrió un error, inténtalo de nuevo más tarde.');
            }
        }
    }

    public function render()
    {
        return view('pages.auth.register')->layout('components.layouts.auth.auth', [
            'title' => 'Register'
        ]);
    }
}
