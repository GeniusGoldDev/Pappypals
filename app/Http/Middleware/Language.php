<?php


namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class Language
{

    /*  
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
    */
    public function handle($request, Closure $next)
    {
        //echo "Session is : " . Session::get('locale');
        //dd("here");
        if (Session::has('locale')) {

            $locale = Session::get('locale', Config::get('app.locale'));
        } else {
            $locale = 'sv';
        }
        App::setLocale($locale);
        return $next($request);
    }
}
    