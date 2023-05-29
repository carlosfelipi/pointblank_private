<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class Hash extends Controller
{
    public function md5($password)
    {
        $output = hash_hmac('md5', $password, '/x!a@r-$r%an¨.&e&+f*f(f(a)', false);
        return $output;
    }
}
