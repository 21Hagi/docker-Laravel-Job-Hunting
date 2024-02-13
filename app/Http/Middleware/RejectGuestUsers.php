<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RejectGuestUsers
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
        $rejectedUserId = 1;

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::id() == $rejectedUserId) {
            abort(403);
        }

        return $next($request);
    }
}
