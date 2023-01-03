<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
{
    //midleware voor ZPPer - user
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->user()){
            if(auth()->user()->account_type == 0) {
                return $next($request);
            } else {
                return redirect('admin')->with('error','you do not have user access');
            }
        }

        return \Redirect::route('login');
    }
}
