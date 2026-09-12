<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AuthAPI
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token_plain_text = $request->bearerToken();

        if ($token_plain_text && $this->check_access_token($token_plain_text)) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthenticated.'], 401);
    }

    public function check_access_token(string $token_plain_text): bool
    {
        $access_token = PersonalAccessToken::findToken($token_plain_text);

        if (! $access_token || $access_token->expires_at?->isPast()) {
            return false;
        }

        // Auth::guard('sanctum')->setUser($access_token->tokenable);
        // Auth::shouldUse('sanctum');

        return true;
    }
}
