<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Illuminate\Http\Request;

class CheckVendor
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (api()->check()) {
            if (api()->user()->type != 'vendor') {
                return helperJson(null, 'you can`t access this method', 431);
            }
            return $next($request);
        }
        return helperJson(null, 'Authorization Token not found', 430);
    }
}
