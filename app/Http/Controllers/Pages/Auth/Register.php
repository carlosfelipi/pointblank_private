<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Modules\Message;
use App\Mail\Confirm\Account;
use App\Models\Blacklist;
use App\Models\Temporary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class Register extends Component
{
    public $login, $email, $password, $confirmation, $term;

    protected $rules = [
        'login' => 'required|max:16|min:5|unique:accounts,login|unique:accounts_temporary,login|regex:/(^[a-za-z0-9 ]+$)+/',
        'email' => 'required|unique:accounts,email|unique:accounts_temporary,email|email',
        'password' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/',
        'confirmation' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/|same:password',
        'term' => 'required'
    ];

    protected $messages = [
        'login.required' => 'O usuário precisa ser preenchido.',
        'login.min' => 'O usuário precisa ter no mínimo :min caracteres.',
        'login.max' => 'O usuário só pode ter no máximo :max caracteres.',
        'login.unique' => 'Usuário já existe, tente outro.',
        'login.regex' => 'O usuário só pode ter letras minúsculas.',
        'email.required' => 'O e-mail precisa ser preenchido.',
        'email.unique' => 'E-mail já está sendo usado, tente outro.',
        'email.email' => 'Formato de e-mail inválido.',
        'password.required' => 'A senha precisa ser preenchido.',
        'password.min' => 'A senha precisa ter no mínimo :min caracteres.',
        'password.max' => 'A senha só pode ter no máximo :max caracteres.',
        'password.regex' => 'A senha só pode ter letras minúsculas.',
        'confirmation.required' => 'A confirmação de senha precisa ser preenchido.',
        'confirmation.min' => 'A confirmação de senha precisa ter no mínimo :min caracteres.',
        'confirmation.max' => 'A confirmação de senha só pode ter no máximo :max caracteres.',
        'confirmation.regex' => 'A confirmação de senha só pode ter letras minúsculas.',
        'confirmation.same' => 'As senhas não coincidem.',
        'term.required' => 'Concorde com os termos de uso.'
    ];

    public function domain($email)
    {
        return Blacklist::where('domain', $email)->where('state', true)->first();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function registerProccess()
    {
        $validatedData = $this->validate();
        $email = explode('@', $validatedData['email']);
        if ($this->domain($email[1])) {
            $this->addError('email', 'Não aceitamos e-mail temporários.');
            $this->domain($email[1])->increment('attempt', 1);
        } else {
            $temporary = new Temporary([
                'login' => $validatedData['login'],
                'password' => $this->hash->md5($validatedData['password']),
                'email' => $validatedData['email'],
                'token' => strtolower(Str::random('35')),
                'created_at' => Carbon::now(),
                'expired_at' => Carbon::now()->addDay('1')
            ]);
            if ($temporary->save()) {
                Mail::to($validatedData['email'])->send(new Account($temporary));
                return redirect()->route('indexPage')->with('message', Message::sendAlert(["msg" => "Verifique o seu e-mail, encaminhamos link de ativação para " . $validatedData['email'] . ".", "type" => "success"]));
            }
            return redirect()->back()->with('message', Message::sendAlert(["msg" => "Ocorreu um erro,tente novamente mais tarde.", "type" => "error"]));
        }
    }

    public function render()
    {
        return view('pages.auth.register');
    }
}
