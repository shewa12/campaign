<?php

namespace admin\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Employee
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
            $this->user = Auth::user();
            if($this->user->role===2){
                return $next($request);
            }
            else{
                //echo "you are not employee";
                return redirect()->back();
            }        
        //return $next($request);
    }
}
