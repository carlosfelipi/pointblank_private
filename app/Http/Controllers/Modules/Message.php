<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\PMessage;
use Carbon\Carbon;

class Message extends Controller
{
    public static function sendMessageBoxPlayer($attribute)
    {
        return PMessage::insert([
            'owner_id' => $attribute['player'],
            'sender_name' => env('APP_NAME', 'Website'),
            'text' => $attribute['message'],
            'expire' => Carbon::now()->addDays(7)->format('ymdHi')
        ]);
    }
 
    public static function sendAlert($attribute)
    {
        return <<<HTML
     <div class="toastDel">
        <script>
            const iconType = "{$attribute['type']}";
            const successSound = document.getElementById("successSound");
            const errorSound = document.getElementById("errorSound");
            const infoSound = document.getElementById("infoSound");
            const playSoundByIconType = (iconType) => {
                switch (iconType) {
                    case "success":
                        successSound.play();
                        break;
                    case "error":
                        errorSound.play();
                        break;
                    case "info":
                        infoSound.play();
                        break;
                    default:
                        break;
                }
            };
            playSoundByIconType(iconType);
            $.toast({
                text: "{$attribute['msg']}",
                icon: "{$attribute['type']}",
                hideAfter: "5000",
                loaderBg: "#d9edf7",
                showHideTransition: "plain",
                position: "bottom-right",
                afterShown: () => {
                    $(".toastDel").remove();
                }
            });
        </script>
    </div>
    HTML;
    }

    /**
     * Retorna uma saudação com base no horário atual.
     *
     * @return string
     */
    public static function getGreeting()
    {
        $currentTime = Carbon::now();
        $hour = $currentTime->hour;

        switch (true) {
            case $hour >= 6 && $hour < 12:
                return 'Bom dia';
            case $hour >= 12 && $hour < 18:
                return 'Boa tarde';
            case $hour >= 18 && $hour < 24:
                return 'Boa noite';
            default:
                return 'Olá';
        }
    }
}
