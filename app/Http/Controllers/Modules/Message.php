<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\PMessage;
//use Illuminate\Http\Request;

class Message extends Controller
{

    public static function sendMessageBoxPlayer($attribute)
    {
        return PMessage::insert([
            'owner_id' => $attribute['player'],
            'sender_id' => 0,
            'clan_id' => 0,
            'sender_name' => 'Servidor',
            'text' => $attribute['message'],
            'type' => 0,
            'state' => 1, //Não lido
            'cb' => 0,
            'expire' => date("ymdHi", strtotime("+7 days"))
        ]);
    }

    public static function sendAlert($attribute)
    {
        return '
        <div class="toastDel">
        <script>
       $.toast({
          text: "' . $attribute['msg'] . '", 
          icon: "' . $attribute['type'] . '", 
          hideAfter: "5000",
          loaderBg: "#d9edf7",
          showHideTransition: "plain", 
          position: "bottom-right", 
          afterShown: function () { $(".toastDel").remove()}
      });
       </script>
    </div>';
    }
}
