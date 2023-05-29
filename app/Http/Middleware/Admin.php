<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->access_admin == true) {
                return $next($request);
            } else {
                return redirect()->route('indexPage')->with('toast_error', "Você não tem autorização para acessar essa página.");
            }
        } else {
            return redirect()->route('indexPage')->with('toast_error', "Faça o login antes para acessar essa página.");
        }
    }
}
