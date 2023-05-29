<?php

namespace App\Http\Controllers\Pages\Auth\Forgot\Password;

use App\Mail\Forgot\Password;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class StepOne extends Component
{
    public $login, $alert;

    protected $rules = [
        'login' => 'required|max:16|min:5|exists:accounts,login|regex:/(^[a-za-z0-9 ]+$)+/'
    ];

    protected $messages = [
        'login.required' => 'O campo usuário precisa ser preenchido.',
        'login.min' => 'O campo usuário precisa ter no mínimo 5 caracteres.',
        'login.max' => 'O campo usuário só pode ter no máximo 16 caracteres.',
        'login.exists' => 'Usuário inválido ou não existe.',
        'login.regex' => 'O campo usuário só pode ter letras minúsculas.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function forgotPasswordProccess()
    {
        $validated = $this->validate();
        $player = Account::query()->where('login', $validated['login'])->first();
        if ($player->remember_date != Carbon::now()->format('Y-m-d')) {
            $player->update([
                'remember_token' => strtolower(Str::random('35')),
                'remember_date' => Carbon::now()->format('Y-m-d')
            ]);
            Mail::to($player->email)->send(new Password($player));
            $this->addError('alert', 'E-mail de verificação enviado para ' . $player->email);
        }
        $this->addError('alert', 'Atenção ' . $player->login . ' já enviamos um e-mail aguarde...');
    }

    public function render()
    {
        return view('pages.auth.forgot.password.step-one');
    }
}
