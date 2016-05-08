<?php

namespace App\Http\Middleware;

use Closure;

class ActiveMiddleware
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
        // dd($request->user());
        if($request->user() == null){
            return redirect('errors.401');
        }
        if(!$request->user()->active ){
                return redirect('errors.401');
            }
        return$next($request);
    }
}
