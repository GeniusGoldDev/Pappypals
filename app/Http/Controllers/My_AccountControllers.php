<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Subuser;
use Illuminate\Http\Request;
use View;
/**
* Homecontroller
*/
class My_AccountControllers extends Controller
{
  
  public function getMy_Account()
  {
    return view('pages.Account.my_account');
  }

  public function getMy_Accounts()
  {
      $subusers =  Auth::user()->users();

      return View::make('pages.Account.user_subusers', ['subusers' => $subusers]);
  }
}