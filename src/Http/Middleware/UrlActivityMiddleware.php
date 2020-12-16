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
            'guard' => $this->getGuardName(),
            'user_id' => auth()->check() ? auth()->user()->id : null,
            'method' => $request->getMethod(),
            'domain' => $request->root(),
            'uri' => $request->getRequestUri(),
            'referer' => $request->headers->get('referer'),
            'ajax' => $request->ajax(),
        ]);

        return $next($request);
    }

    /**
     * Get our current user's guard name
     *
     * @return string|null
     */
    private function getGuardName() : ?string
    {
        $guard_name = null;

        // Loop through each guard and check if that is the one we are logged in as
        foreach (config('auth.guards') as $guard => $values) {
            if (auth()->guard($guard)->check() === true) {
                $guard_name = $guard;
            }
        }

        return $guard_name;
    }
}
