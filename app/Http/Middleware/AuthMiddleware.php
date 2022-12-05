<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Session\Middleware\StartSession;
use Request as clientRequest;



class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (session("user_role") == "user" && clientRequest::is("admin/*")) {
            return back();
        }
        if (session("user_role") == "admin" && clientRequest::is("user/*")) {
            return back();
        }
        if (!session()->has("id") && (clientRequest::is("admin/*") || clientRequest::is("user/*"))) {
            return back();
        }
        if (session()->has("id") && $request->path() == "/") {
            return back();
        }


        return $next($request);
    }
}
