<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Mail;
use App\Models\User;
use App\Models\Logs;
use App\Models\Subuser;
use Illuminate\Database\Eloquent\Model;
use Carbon;
use View;
use Session;
use Hash;
use Validator;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getlogin(Request $requsest)
    {

        // $validator = Validator::make($requsest->all(), [
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return ["error" => "Correct your email and password!"];
        // }
        
        // if(!Auth::attempt($requsest->only(['email', 'password'])))
        // {
        //     return ["info" => "You must fill in the form"];
        // }
        
        // $subusers =  Auth::user()->users();
        
        // if(Auth::user()->stripe_active)
        // {
        //     Auth::user()->Log('Log In');
        //     return ["info" => "You have successfully logged in!"];
        // }else{
        //     Auth::logout();
        //     return ["info" => "You must fill in the form"];
        // }
    }
    public function postlogin(Request $requsest)
    {
        $validator = Validator::make($requsest->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return ["error" => "Validation has gone wrong!"];
        }
        
        if(!Auth::attempt($requsest->only(['email', 'password'])))
        {
            return ["info" => "Your password is incorrect!"];
        }
        
        $subusers =  Auth::user()->users();
        
        if(Auth::user()->stripe_active)
        {
            Auth::user()->Log('Log In');
            return ["info" => "You have successfully logged in!"];
        }else{
            Auth::logout();
            return ["info" => "You did not pay"];
        }
    }
}