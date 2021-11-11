<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckTest
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
        if (Auth::user()->is_active == 0 ) {
            Auth::logout();

            return redirect('/login');
        }

        // if ($request->type != 2) {
        //     return response()->json('Please enter valid type');
        // }

        return $next($request);
    }
}
