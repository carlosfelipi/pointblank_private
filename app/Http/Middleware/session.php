<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Modules\Toast;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class session
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() != true) {
            return $next($request);
        } else {
            return redirect('/')->with('message', Toast::Alert(["msg" => "Atención " . Auth::user()->login . " ¡Ya se ha autentificado!'", "type" => "success"]));
        }
    }
}
