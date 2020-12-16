<?php

namespace Rayblair\UrlActivity\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Rayblair\UrlActivity\Models\UrlActivity;

class UrlActivityMiddleware
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
        // Log our Activity
        UrlActivity::create([
            'ip' => $request->ip(),
            'user_id' => auth()->check() ? auth()->user()->id : null,
            'method' => $request->getMethod(),
            'domain' => $request->root(),
            'uri' => $request->getRequestUri(),
            'referer' => $request->headers->get('referer'),
            'ajax' => $request->ajax(),
        ]);

        return $next($request);
    }
}
