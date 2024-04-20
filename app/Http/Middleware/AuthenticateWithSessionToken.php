<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateWithSessionToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionToken = $request->header('session_token') ?? $request->input('session_token');

        if (!$sessionToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::where('session_token', $sessionToken)->first();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->merge(['user' => $user]);

        return $next($request);
    }
}
