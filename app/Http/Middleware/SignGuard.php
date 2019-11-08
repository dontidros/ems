<?php

namespace App\Http\Middleware;

use Session;

use Closure;

class SignGuard
{

    public function handle($request, Closure $next)
    {
        if (!Session::has('user_id')) {
            return $next($request);
        } else {
            return redirect('');
        }
    }
}
