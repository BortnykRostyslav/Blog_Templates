<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((int)auth()->user()->role !== 0) {
            abort(404);
        }

        //dd(auth()->user()->role);

        return $next($request);
    }
}
