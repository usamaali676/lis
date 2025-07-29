<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;

class LogVisits
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
        if ($request->isMethod('get') && !$request->ajax()) {
            Visit::create([
                'url' => $request->fullUrl(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'referrer' => $request->headers->get('referer'),
                'device_type' => $this->getDeviceType($request->userAgent()),
            ]);
        }

        return $next($request);
    }

    private function getDeviceType($userAgent)
    {
        if (preg_match('/mobile|android|touch|webos|hpwos/i', $userAgent)) {
            return 'mobile';
        }

        return 'desktop';
    }
}
