<?php

namespace App\Http\Middleware;

use Closure;

class Checkemail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->email == 'phanvantrung190207@gmail.com') {
            return $next($request);
        } else {
            return redirect()->route('email_back');
        }
    }
}
