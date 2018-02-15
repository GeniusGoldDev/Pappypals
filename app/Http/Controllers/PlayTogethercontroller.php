<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PlayTogether;
use App\PlayTogeSteg;
use Carbon\Carbon;

class PlayTogethercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Play = PlayTogether::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('playtogether.play_togethers_per_page'));
        $play_toge_steg = PlayTogeSteg::select('play_togethers_id')->where('user_id', auth()->user()->id)->get();
        return view('pages.Account.playtogether.playTogether', compact('Play','play_toge_steg'));
    }


    public function showPost($slug)
    {
        $Play = PlayTogether::whereSlug($slug)->firstOrFail();

        return view('pages.Account.playtogether.playbord')->withplay($Play);
    }

    public function showreleted()
    {
        $related_posts = PlayTogether::orderByRaw("RAND()")->take(3)->get()->toArray();

       return $related_posts;
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
                return view('adminpanel.admin.playTogether');
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
                'title' => 'required|max:255',
                'unit_1_title' => 'required',
                'description_title' => 'required',
                'content_1' => 'required',
                'content_2' => 'required',
                'content_3' => 'required',
                'content_4' => 'required',
                'content_5' => 'required',
                'content_6' => 'required',
                'content_7' => 'required',
                'content_8' => 'required',
                'content_9' => 'required',
                'content_10' => 'required',
                
        ));

        $Play = new PlayTogether;

        $Play->title = $request->title;
        $Play->unit_1_title = $request->title;
        $Play->description_title = $request->unit_1_title;
        $Play->content_1 = $request->content_1;
        $Play->content_2 = $request->content_2;
        $Play->content_3 = $request->content_3;
        $Play->content_4 = $request->content_4;
        $Play->content_5 = $request->content_5;
        $Play->content_6 = $request->content_6;
        $Play->content_7 = $request->content_7;
        $Play->content_8 = $request->content_8;
        $Play->content_9 = $request->content_9;
        $Play->content_10 = $request->content_10;
        


        return redirect()->route('pages.Account.playtogether.show', $Play->id);

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
        $Play = PlayTogether::find($id);
        $next = PlayTogether::where('slug', '>', $Play->slug)->min('slug');
        return view('pages.Account.playtogether.show')->withplay($Play)->with('next', $next);
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
    public function update($id)
    {
        $play_toge_steg = PlayTogeSteg::select('play_togethers_id')->where('user_id', auth()->user()->id)->where('play_togethers_id', $id)->get();
        if (!strpos($play_toge_steg, $id)){
            $play_toge_steg = new PlayTogeSteg;
            $play_toge_steg->user_id = auth()->user()->id;
            $play_toge_steg->play_togethers_id = $id;
            $play_toge_steg->save();
            echo $play_toge_steg;
        }
        else{
            echo $play_toge_steg;
        }
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
