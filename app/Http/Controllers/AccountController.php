<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Subuser;
use Illuminate\Http\Request;
use View;
/**
* AccountController
*/
class accountControllers extends Controller
{
  
  public function getaccount()
  {
    return view('pages.payment.account');
  }

  public function getaccounts()
  {
      $subusers =  Auth::user()->users();

      return View::make('pages.Account.user_subusers', ['subusers' => $subusers]);
  }
}