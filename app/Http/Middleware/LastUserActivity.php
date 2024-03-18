<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (auth()->user()->role_id == '6') {

                $expiredAt = Carbon::now()->addMinutes(2);

                Cache::put('user-is-online' . Auth::user()->instructor->user_id, true, $expiredAt);
            } elseif (auth()->user()->role_id == '8') {

                $expiredAt = Carbon::now()->addMinutes(2);

                Cache::put('user-is-online' . Auth::user()->student->user_id, true, $expiredAt);
            }
        }
        return $next($request);
    }
}
