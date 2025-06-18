<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class DuplicatePaymentChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cacheKey = 'duplicate_payment_' . $request->input('user_id');
        $cacheTime = 60; // Cache time in seconds
        $cacheValue = 'payment:' .$request->input('user_id') . ':' . $request->input('amount');


        if(Cache::get($cacheKey) === $cacheValue) {
            toastify()->error('Duplicate payment detected!');
            return redirect()->back();
        }

        $response = $next($request);

        Cache::put($cacheKey, $cacheValue, $cacheTime);

        return $response;
    }
}
