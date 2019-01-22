<?php

namespace App\Http\Middleware;

use Closure;
use session;
use Auth;
class Lang
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
        if(Auth::check()){
            if(Auth::user()->lang){
                session()->put('lang',Auth::user()->lang);
                App()->setlocale(Auth::user()->lang);
                // dd(Auth::user()->lang,App()->getlocale());
            }else{
                if(session()->has('lang')){
                    if(session()->get('lang') == 'ar'){
                        App()->setlocale('ar');
                    }elseif(session()->get('lang') == 'en'){
                        App()->setlocale('en');
                    }
                }else{
                    App()->setlocale('ar');
                }
            }
        }else{
            if(session()->has('lang')){
                if(session()->get('lang') == 'ar'){
                    App()->setlocale('ar');
                }elseif(session()->get('lang') == 'en'){
                    App()->setlocale('en');
                }
            }else{
                App()->setlocale('ar');
            }
        }
        return $next($request);
    }
}
