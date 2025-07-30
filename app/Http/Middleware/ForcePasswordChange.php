<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForcePasswordChange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  public function handle($request, Closure $next)
{
    if ($request->user() && $request->user()->must_change_password) {
        if ($request->route()->getName() !== 'password.change' && $request->route()->getName() !== 'password.change.update') {
            return redirect()->route('password.change');
        }
    }
    return $next($request);
}
}