<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * Been discontinued
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guest() || auth()->user()->username != 'henrylemmon') {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
