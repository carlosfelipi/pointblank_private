<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;

class Hmac extends Controller
{
    public static function hmac($password)
    {
        $regex = '/x!a@r-$r%an¨.&e&+f*f(f(a)';
        $encryption = hash_hmac('md5', $password, $regex);
        return $encryption;
    }
}
