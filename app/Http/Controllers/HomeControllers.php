<?php

namespace App\Http\Controllers;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
* Homecontroller
*/
class HomeControllers extends Controller
{

  public function home()
  {
    if(Auth::user())
    {
      $subusers =  Auth::user()->users();
      return view('SubUsers.show', ['subusers' => $subusers]);
    }else{
      //return view('Auth.signin');
    return redirect('/signin');
    }  
  }

  public function getmodule()
  {
    return view('pages.Account.module');
  }
  public function getcontact()
  {
    return view('pages.Account.contact');
  }
  public function getfaq()
  {
    return view('pages.Account.faq');
  }
  public function getarticles()
  {
      $posts = Post::where('published_at', '<=', Carbon::now())
          ->orderBy('published_at', 'desc')
          ->paginate(config('blog.posts_per_page'));

    return view('pages.Account.articles', compact('posts'));
  }
  public function getvideos()
  {
    return view('pages.Account.videos');
  }
  public function getEQ()
  {
    return view('pages.Account.eq');
  }
}