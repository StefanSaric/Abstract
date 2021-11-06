<?php

namespace App\Http\Middleware;

use App\Models\Files;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->id == $request->route()->parameter('file')->user_id)
            return $next($request);
        else
            abort(403);
    }
}
