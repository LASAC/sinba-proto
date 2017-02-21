<?php

namespace App\Http\Middleware;

use Closure;

class DevOnly
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
        if(env('APP_ENV') !== 'local') {
            return redirect('welcome');
        }

        return $next($request);
    }
}
