<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Support\Facades\Log;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next) {
        if (env('APP_ENV') === 'local') {
            $url = $request->url();
            $token = $request->header('X-CSRF-TOKEN');
            Log::debug("\n\n\n\n\n\n\n\nVerifyCsrfToken > custom handler");
            Log::debug('URL: ' . $url);
            Log::debug('TOKEN: ' . $token);
            if ($token === '__CSRF-TOKEN__') {
                Log::debug('Local React App Env - skipping verification...');
                return $next($request);
            }
        }
        
        return parent::handle($request, $next);
    }
}
