<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;


class Toast extends Controller
{
    public static function alert($attributes)
    {
        $text = $attributes['msg'] ?? 'message null';
        $icon = $attributes['type'] ?? 'success';
        return '
        <div class="toastDel">
       <script>
       $.toast({
          text: "' . $text . '", 
          icon: "' . $icon . '", 
          hideAfter: "30000",
          loaderBg: "#d9edf7",
          showHideTransition: "plain", 
          position: "bottom-right", 
          afterShown: function () { $(".toastDel").remove()}
      });
       </script>
    </div>';
    }
}
