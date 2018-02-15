<?php



namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Subuser;
use Illuminate\Http\Request;

use View;

class SubUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(Auth::check())
        {
        $subusers =  Auth::user()->users();

      return View::make('SubUsers.show', ['subusers' => $subusers]);
        }else{
            
            return  redirect()->route('getsignin')->with('info', 'logged out');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check())
        {
            return View('SubUsers.create');
        }else{
            
            return  redirect()->route('getsignin')->with('info', 'logged out');
        }
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


        //$enddate = $request->input('username');
        //$members = $request->image;

        //dd($request->all());

        $this->validate($request, [
          'username' => 'required|alpha_dash|max:20',
          'birthdate' => 'required',
          'userimage' => 'required',
         /* 'grade' => 'required', */
      ]);
      
      Subuser::create([
        'username' => $request->input('username'),
        'birthdate' => $request->input('birthdate'),
        'userimage' => $request->input('userimage'),
     
         'user_id' =>   Auth::user()->getId(),
        
      ]); 
      return redirect('subusers');
  }
  
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
      //  return View::make('SubUsers.modify') ->withModel($subuser);
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
        if(Auth::check())
        {
            $subuser =  Auth::user()->userbyId($id);
            
            if($subuser == null)
            {
                return redirect('subusers');
            }
            return View::make('SubUsers.edit')->with('subuser', $subuser);
        }else{
        
            return  redirect()->route('getsignin')->with('info', 'logged out');
        }
        //
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //$input = Request::all();
        $id =$request['userid'] ;
        //
        $subuser =  Auth::user()->userbyId($id);
           
        $subuser->username = $request['username'];
        $subuser->birthdate = $request['birthdate'];
       /* $subuser->grade = $request['grade'];*/
        $subuser->save();

        

        return redirect('subusers');
       
        }
    

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      
        
        $id = $request->input('userid');
        
        $subuser =  Auth::user()->userbyId($id);
        if($subuser == null)
        {
            return redirect('subusers');
        }
        $subuser->delete();
        return redirect('subusers');
    }
    public function delete($id)
    {
        
        if(Auth::check())
        {
            $subuser =  Auth::user()->userbyId($id);
            if($subuser == null)
            {
                return redirect('subusers');
            }
            return View::make('SubUsers.delete')->with('subuser', $subuser);
        }else{
            
            return  redirect()->route('getsignin')->with('info', 'logged out');
        }
    }
     public function select(Request $request)
    {
        //$input = Request::all();
       
        if(Auth::check())
        {
            $id =$request['subuserid'] ;
            
       
            
        }else{
            
            return  redirect()->route('getsignin')->with('info', 'logged out');
        }
     }
}
