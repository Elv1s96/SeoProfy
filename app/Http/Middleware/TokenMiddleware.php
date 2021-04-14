<?php

namespace App\Http\Middleware;

use App\Http\Services\Token;
use Closure;
use Illuminate\Http\Request;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJ1c2VybmFtZSI6ImRvZGk";
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('access_token');
        if(!$token || $token!= $this->token)
        {
            return response()->json(['status' => 'Token is Invalid']);
        }
//        $checkToken = Token::checkToken($request);
//        if(!$checkToken) {
//            return response()->json(['status' => 'Token is Invalid']);
//        }
        return $next($request);
    }
}
