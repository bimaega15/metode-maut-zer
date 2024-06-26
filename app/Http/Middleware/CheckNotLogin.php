<?php

namespace App\Http\Middleware;

use App\Helper\Check;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckNotLogin
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
        if (Auth::id() == null) {
            unset(Auth::user()->key);
            $request->session()->flash('error', 'Authorization access');
            return redirect(url('/'));
        }
        return $next($request);
    }
}
