<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Closure;
use App\User;
class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // check the user token
        $user_logged = User::where('api_token',$request->api_token)->first();
        if($user_logged == null){
            return response(['unauthorized'],503);
        }
        $request->attributes->add(['user' => $user_logged]);
        
        return $next($request);
    }
}
