<?php

namespace App\Http\Middleware;

use Closure;

class CheckSubscriber
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
        $user = auth()->user();
        if($user->status == 'new'){
            return redirect(app()->getLocale().'/home/welcome');
        }
        return $next($request);
    }
}
