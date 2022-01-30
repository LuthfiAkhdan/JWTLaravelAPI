<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class BeforeLogin
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
        if (Session::get('id') == null) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
