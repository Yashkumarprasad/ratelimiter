<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RestrictMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $ip_address = $request->ip();
        $session_key = 'session_' . $ip_address;

        if (Cache::has($session_key)) {
            return response()->json(['status' => 0,'msg' => 'Another session is in progress.']);
        } else {
            Cache::put($session_key, true, now()->addMinutes(30));
        }

        return $next($request);
    }
}
