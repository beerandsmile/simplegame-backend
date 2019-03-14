<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class TokenMiddleware
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
        $user = $this->user->where(['token' => $request->header('token')]) {
            return $next($request);
        }

        return response(['status' => 'error', 'messages' => ['Передан невалидный токен']], 403);
    }
}
