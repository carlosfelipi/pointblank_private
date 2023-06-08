<?php

namespace App\Http\Controllers\Pages\Auth\Social;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Message;
use App\Models\Account;
use App\Models\AccountSocialite;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite as FacadesSocialite;
//use Illuminate\Http\Request;

class Provider extends Controller
{
    public function redirectProvider($provider)
    {
        return FacadesSocialite::driver($provider)->redirect();
    }

    public function providerCallback($provider)
    {
        $resultProvider = FacadesSocialite::driver($provider)->user();
        $player = Account::where('email', $resultProvider->getEmail())->first();
        if ($player) {
            $player->provider = $provider;
            if ($player->save()) {
                Auth::loginUsingId($player->player_id);
                return redirect()->route('indexPage')->with('message', Message::sendAlert(["msg" => "Bem vindo soldado $player->login!", "type" => "success"]));
            }
        } else {
            //Verificando se o usuário já possui uma conta social temporaria;
            $accountSocialiteCheck = AccountSocialite::where('provider_email', $resultProvider->getEmail())->first();
            if ($accountSocialiteCheck) {
                return redirect()->route('completeSocialPage', ['provider' => $provider . '?token=' . $accountSocialiteCheck->token])->with(
                    'message',
                    Message::sendAlert(
                        [
                            "msg" =>  "Bem vindo $accountSocialiteCheck->provider_name , complete sua conta com um login e uma senha para ter acesso ao jogo.",
                            "type" => "success"
                        ]
                    )
                );
            } else {
                //Criando uma conta temporária pro usuário por depois
                //login e senha para ter acesso ao game;
                $accountSocialite = new AccountSocialite();
                $accountSocialite->provider_id = $resultProvider->getId();
                $accountSocialite->provider_email = $resultProvider->getEmail();
                $accountSocialite->provider_avatar = $resultProvider->getAvatar();
                $accountSocialite->provider_name = $resultProvider->getName() ?? $resultProvider->getNickname();
                $accountSocialite->provider = $provider;
                $accountSocialite->token = strtolower(Str::random('35'));
                $accountSocialite->created_at = Carbon::now();
                $accountSocialite->expired_at = Carbon::now()->addDay('1');
                if ($accountSocialite->save()) {
                    return redirect()->route('completeSocialPage', ['provider' => $provider . '?token=' . $accountSocialiteCheck->token])->with(
                        'message',
                        Message::sendAlert(
                            [
                                "msg" =>  "Bem vindo $accountSocialiteCheck->provider_name , complete sua conta com um login e uma senha para ter acesso ao jogo.",
                                "type" => "success"
                            ]
                        )
                    );
                }
            }
            return redirect()->route('indexPage')->with('message', Message::sendAlert(["msg" => "Ocorreu um erro,tente novamente mais tarde.", "type" => "error"]));
        }
    }
}
