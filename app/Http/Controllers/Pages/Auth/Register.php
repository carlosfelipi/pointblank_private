<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Modules\Message;
use App\Mail\Confirm\Account;
use App\Models\Blacklist;
use App\Models\Temporary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Modules\Hash;
use Livewire\Component;

class Register extends Component
{

    public $login, $email, $password, $confirmation, $term;

    public bool $showPassword = false;

    public bool $showConfirmation = false;

    private Hash $hash;

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

    public function domain($email)
    {
        return Blacklist::where('domain', $email)->where('state', true)->first();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function registerProcess()
    {
        try {
            $validatedData = $this->validate();
            $email = explode('@', $validatedData['email']);
            if ($this->domain($email[1])) {
                $this->addError('email', 'Não aceitamos e-mails temporários.');
                $this->domain($email[1])->increment('attempt', 1);
                return;
            }
            DB::beginTransaction();
            $temporary = new Temporary([
                'login' => $validatedData['login'],
                'password' => $this->hash->md5($validatedData['password']),
                'email' => $validatedData['email'],
                'token' => strtolower(Str::random('35')),
                'created_at' => Carbon::now(),
            ]);
            if (!$temporary->save()) {
                DB::rollBack();
                return redirect()->back()->with('message', Message::sendAlert([
                    'msg' => 'Ocorreu um erro. Por favor, tente novamente mais tarde.',
                    'type' => 'error'
                ]));
            }
            Mail::to($validatedData['email'])->send(new Account($temporary));
            DB::commit();
            return redirect()->route('indexPage')->with('message', Message::sendAlert([
                'msg' => 'Verifique o seu e-mail. Enviamos um link de ativação para ' . $validatedData['email'] . '.',
                'type' => 'success'
            ]));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message', Message::sendAlert([
                'msg' => 'Ocorreu um erro. Por favor, tente novamente mais tarde.',
                'type' => 'error'
            ]));
        }
    }

    protected function rules()
    {
        return [
            'login' => 'required|max:16|min:5|unique:accounts,login|unique:accounts_temporary,login|regex:/(^[a-za-z0-9 ]+$)+/',
            'email' => 'required|unique:accounts,email|unique:accounts_temporary,email|email',
            'password' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/',
            'confirmation' => 'required|max:16|min:5|regex:/(^[a-za-z0-9 ]+$)+/|same:password',
            'term' => 'required'
        ];
    }

    protected function messages()
    {
        return [
            'login.required' => 'O campo usuário precisa ser preenchido.',
            'login.min' => 'O usuário precisa ter no mínimo :min caracteres.',
            'login.max' => 'O usuário só pode ter no máximo :max caracteres.',
            'login.unique' => 'Usuário já existe, tente outro.',
            'login.regex' => 'O usuário só pode conter letras minúsculas e números.',
            'email.required' => 'O campo e-mail precisa ser preenchido.',
            'email.unique' => 'E-mail já está sendo usado, tente outro.',
            'email.email' => 'Formato de e-mail inválido.',
            'password.required' => 'O campo senha precisa ser preenchido.',
            'password.min' => 'A senha precisa ter no mínimo :min caracteres.',
            'password.max' => 'A senha só pode ter no máximo :max caracteres.',
            'password.regex' => 'A senha só pode conter letras minúsculas e números.',
            'confirmation.required' => 'O campo confirmação de senha precisa ser preenchido.',
            'confirmation.min' => 'A confirmação de senha precisa ter no mínimo :min caracteres.',
            'confirmation.max' => 'A confirmação de senha só pode ter no máximo :max caracteres.',
            'confirmation.regex' => 'A confirmação de senha só pode conter letras minúsculas e números.',
            'confirmation.same' => 'As senhas não coincidem.',
            'term.required' => 'Concorde com os termos de uso.'
        ];
    }
    
    public function render()
    {
        return view('pages.auth.register');
    }
}
