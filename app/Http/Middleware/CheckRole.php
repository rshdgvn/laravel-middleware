<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check())
        {
            abort(403, 'You are not authenticated');
        }
        else
        {
            if ($role === 'admin'){
                return $this($request);
            }elseif ($role == 'student'){
                return $this($request);
            }
        }

        return abort(404);
    }
}
