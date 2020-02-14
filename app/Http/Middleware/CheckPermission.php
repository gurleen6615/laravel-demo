<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $currectAction = $request->route()->getAction();
        $c_array = explode('\\',$currectAction['controller']);
        if($c_array[0]=="App" && !in_array('Auth',$c_array) ){
            $end = explode("@", end($c_array));
            $permission = $end[0].'_'.$end[1];
            if(auth()->user()->cannot($permission)):
                return redirect('home')->with('error',"You don't have access.");
            endif;
        }
        return $next($request);
    }
}
