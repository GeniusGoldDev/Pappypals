<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use URL;
class SecurityCheck
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
       $security_detect_url = [
           URL::to('subusers'),
           URL::to('/'),
           URL::to('/signin'),
       ];
    $allowable_url = [
           URL::to('/account'),
           URL::to('/EQ'),
           URL::to('/playTogether'),
           URL::to('/articles'),
           URL::to('/module'),
           URL::to('/activities'),
           URL::to('/videos'),
           URL::to('/settings'),
           URL::to('/faq'),
           URL::to('/playModule'),
           URL::to('/activities/{Id}'),
           URL::to('/contact'),
           URL::to('/articles'),
       URL::to('/SecurityCheck'),
       URL::to('/Activity'),
       URL::to('/playbord'),
       ];
    $referer_url = rtrim($request->headers->get('referer'),'/');
    $current_url = $request->url();
    $current_url_arr = explode('/', $current_url);
    $curr_pos = end($current_url_arr);
    $current_url1 = $_SERVER['REQUEST_URI'];
    $current_url_arr1 = explode('/', $current_url1);
    $curr_pos1 = end($current_url_arr1);
       
     if(in_array($referer_url, $security_detect_url)){
           if($curr_pos1 == 'Activity') {
       $messages = array(
      '1' => ''
      );
      return view('Auth.SecurityCheck')->with('messages', $messages)->with('redirect_to','Activity');
       }
       return redirect(URL::to('/SecurityCheck'));
       } elseif(!in_array($referer_url, $allowable_url) && \Request::is('activities/*') && \Request::is('playbord/*')) { 
     
         
         
       if($curr_pos == 'EQ') {
         
         $messages = array(
        '1' => ''
        );
         return view('Auth.SecurityCheck')->with('messages', $messages)->with('redirect_to','EQ');
       } elseif($curr_pos == 'playTogether') {
         
         $messages = array(
        '1' => ''
        );
         return view('Auth.SecurityCheck')->with('messages', $messages)->with('redirect_to','playTogether');
       } elseif($curr_pos == 'articles') {
         
         $messages = array(
        '1' => ''
        );
         return view('Auth.SecurityCheck')->with('messages', $messages)->with('redirect_to','articles');
     //return redirect('/SecurityCheck')->with('messages', $messages)->with('redirect_to','articles');
       } elseif($curr_pos == 'module') {
         
         $messages = array(
        '1' => ''
        );
         return view('Auth.SecurityCheck')->with('messages', $messages)->with('redirect_to','module');
       } elseif($curr_pos == 'activities') {
         
         $messages = array(
        '1' => ''
        );
         return view('Auth.SecurityCheck')->with('messages', $messages)->with('redirect_to','activities');
       } elseif($curr_pos == 'videos') {
         
         $messages = array(
        '1' => ''
        );
         return view('Auth.SecurityCheck')->with('messages', $messages)->with('redirect_to','videos');
       } elseif($curr_pos == 'playModule') {
         
         $messages = array(
        '1' => ''
        );
         return view('Auth.SecurityCheck')->with('messages', $messages)->with('redirect_to','playModule');
       } elseif($curr_pos == 'account') {
         
         $messages = array(
        '1' => ''
        );
         return view('Auth.SecurityCheck')->with('messages', $messages)->with('redirect_to','account');
     //return redirect('/SecurityCheck')->with('messages', $messages)->with('redirect_to','account');
       } 
    } 
       return $next($request);
    }

}