<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\Language;

use App;
use Lang;

class LanguageController extends Controller
{

    public function __construct() { 
        $this->middleware(Language::class);
    }

    public function chooser(){
        Session::set('locale', Input::get('locale'));
        return Redirect::back();
    }
}