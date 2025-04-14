<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class HandleAuthorization
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('X-API-KEY');
        $expectedKey = env('API_KEY');

        if ($apiKey !== $expectedKey) {
            return response()->json(['message' => 'Invalid API Key'], 403);
        }

        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['message' => 'Token expired'], 401);
        } catch (TokenInvalidException $e) {
            return response()->json(['message' => 'Token invalid'], 401);
        } catch (JWTException $e) {
            return response()->json(['message' => 'Token not found'], 401);
        }

        return $next($request);
    }
}
