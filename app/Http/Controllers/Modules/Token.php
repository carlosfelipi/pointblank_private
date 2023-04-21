<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class Token extends Controller
{
    public static function random($length)
    {
        return Str::random($length);
    }
}
