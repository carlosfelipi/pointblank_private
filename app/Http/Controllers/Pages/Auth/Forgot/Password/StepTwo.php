<?php

namespace App\Http\Controllers\Pages\Auth\Forgot\Password;

use App\Http\Controllers\Modules\Hash;
use App\Http\Controllers\Modules\Message;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class StepTwo extends Component
{
    public $password, $confirmation, $token;

    public bool $showPassword = false;

    public bool $showConfirmation = false;

    private Hash $hash;

    protected $queryString = ['token'];

    public function __construct()
    {
        $this->hash = new Hash();
    }

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function toggleConfirmationVisibility()
    {
        $this->showConfirmation = !$this->showConfirmation;
    }

    public function Updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function newPasswordProccess()
    {
        #test (fn) => http://127.0.0.1:8000/register-new-password?token=186d7833-0766-451e-99e2-379a34824841
        $validated = $this->validate();
        $player = Account::query()->where('remember_token', $this->token)->first();
        if ($this->hash->md5($validated['password']) === $player->password) {
            $this->addError('password', 'A sua senha atual é igual a sua senha antiga, tente outra senha.');
        } else {
            $player->password = $this->hash->Md5($validated['password']);
            $player->remember_token = Str::uuid();
            $player->updated_at = Carbon::now();
            if ($player->save()) {
                Auth::loginUsingId($player->player_id);
                return redirect()->route('indexPage')->with('message', Message::sendAlert(["msg" => "Bem vindo novamente soldado $player->login, sua nova senha foi definida.", "type" => "success"]));
            }
            return redirect()->route('indexPage')->with('message', Message::sendAlert(["msg" => "Erro ao processar usuário,tente novamente mais tarde.", "type" => "error"]));
        }
    }

    protected function rules()
    {
        return [
            'password' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/',
            'confirmation' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/|same:password',
            'token' => 'required|exists:accounts,remember_token'
        ];
    }

    protected function messages()
    {
        return [
            'password.required' => 'O campo senha precisa ser preenchido.',
            'password.min' => 'O campo senha precisa ter no mínimo 5 caracteres.',
            'password.max' => 'O campo senha pode ter no máximo 16 caracteres.',
            'password.regex' => 'O campo senha só pode conter letras minúsculas.',
            'confirmation.required' => 'O campo confirmação de senha precisa ser preenchido.',
            'confirmation.min' => 'O campo confirmação de senha precisa ter no mínimo 5 caracteres.',
            'confirmation.max' => 'O campo confirmação de senha pode ter no máximo 16 caracteres.',
            'confirmation.regex' => 'O campo confirmação de senha só pode conter letras minúsculas.',
            'confirmation.same' => 'As senhas não coincidem.',
            'token.required' => 'O token de autorização não foi fornecido.',
            'token.exists' => 'Token inválido ou foi modificado.'
        ];
    }

    public function render()
    {
        return view('pages.auth.forgot.password.step-two');
    }
}
