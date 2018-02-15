<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\activites;
use Carbon\Carbon;


class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activities = activites::where('created_at', '<=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->paginate(config('activities.activites_per_page'));       
        return view('pages.Account.Activities.activities', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            if(Auth::user()->is_admin()){
                return view('adminpanel.admin.activities')->with('info', 'only admin');
            }else{
               return redirect()->back()->with('info', 'only admin');
            }
        }else{
           return redirect('/'); 
        }
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
        $this->validate($request, array(
            'title' => 'requirde|max:255',
            'madia' => 'required',
            'content' => 'required',
            'first-unit-title' => 'required',
            'first-unit-content' => 'required',
            'second-unit-title' => 'required',
            'second-unit-content' => 'required',
            'third-unit-title' => 'required',
            'third-unit-content' => 'required'
        ));

        $activities = new activites;
        $activities->title = $request->title; 
        $activities->madia = $request->madia;
        $activities->content = $request->content;
        $activities->firs_unit_title = $request->first-unit-title;
        $activities->first_unit_content = $request->first-unit-content;
        $activities->second_unit_title = $request->second-unit-title;
        $activities->second_unit_content = $request->second-unit-content;
        $activities->third_unit_title = $request->third-unit-title;
        $activities->third_unit_content = $request->third-unit-content; 

        $activities->save();

        Session::flash('succsess', 'saved');
        
        return redirect()->route('pages.Account.Activities.show', $activities->$id);
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
        $activities = activites::find($id);
        return view('pages.Account.Activities.show')->with('activities',$activities);
    }


    public function showreleted()
    {
        $related_posts = activites::orderByRaw("RAND()")->take(3)->get();
        return $related_posts;
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
}
