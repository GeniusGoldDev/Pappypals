<?php
namespace App\Http\Controllers;
use Auth;
use Mail;
use App\Models\User;
use App\Models\Logs;
use App\Models\Subuser;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Carbon;
use View;
use Session;
use Hash;
use Validator;
use Lang;
/**
* ADMIN CONTROLLERS
*/
class AuthControllers extends Controller
{
  /**
  * VIWE FUNCTION TO RIGESTER
  */
  
  public function getSignup()
  {
      if(Auth::check())
      {
          //redirect to index if already signed in
          return redirect('/');
      }
    return view('Auth.signup');
  }
  public function getSignin()
  {
      if(Auth::check())
      {
      //redirect to index if already signed in
          return redirect('/');
      }
    return view('Auth.signin');
  }
  public function getcreateAccount()
  {
    return view('Auth.create-account');
  }
  /**
  * INSERT FUNCTION TO RIGESTER 
  * AND VALIDATE ALLA THE DATA THAT COMES THROUGH
  */
  public function postSignup(Request $requsest)
  {
      $this->validate($requsest, [
          'email' => 'required|unique:users|email|max:255',
          'first_name' => 'required|alpha_dash|max:20',
          'last_name' => 'required|alpha_dash|max:20',
          'password' => 'required|min:5',
          'country' => 'required|alpha_dash|max:20',
      ]);
      
      User::create([
        'email' => $requsest->input('email'),
        'first_name' => $requsest->input('first_name'),
        'last_name' => $requsest->input('last_name'),
        'password' => bcrypt($requsest->input('password')),
         'country' => $requsest->input('country'),
          'state' => $requsest->input('state'),
      ]); 
      //check first login for securtity check avoidance
      Session::set('firstlogin', true);
      if(!Auth::attempt($requsest->only(['email', 'password'])))
      {
          return redirect()->back()->with('info', 'tagga');
      }
     Auth::user()->Log('Register');
      return redirect()->route('subscription')->with('info', 'Ditt konto har registrerats');
    
  }
  public function postSignin(Request $requsest)
  {
       $validator = Validator::make($requsest->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('signin')
                        ->withErrors($validator)
                        ->withInput();
        }
          
      if(!Auth::attempt($requsest->only(['email', 'password'])))
      {
            $var = Lang::get('app.wrong_user_password');
          return redirect()->back()->with('info', $var);
      }
     
     $subusers =  Auth::user()->users();
     Auth::user()->Log('Log In');
    
     if(Auth::user()->subscribed())
     {
        return redirect('/subusers')->with('subusers', $subusers);
     }else{
         return view('pages.payment.join')->with('user',  Auth::user());
     }
    
  }
  public function postSignOut()
  {
     
    $this->AddLog('Log Out',Auth::User()->email,Auth::User()->id);
    Auth::logout();
  
    Session::flush();
    return redirect('signin')->with('info', 'Du är nu utloggad');
  }
  
  /******
  *
  * SUBUSER OSÄKERT 
  *
  ******************************/ 
  public function postcreateAccount(Request $requsest)
  {
      $this->validate($requsest, [
          'username' => 'required|unique:subuser|alpha_dash|max:20',
          'age' => 'required',
          /*'grade' => '', */
      ]);
      
      Subuser::create([
        'username' => $requsest->input('username'),
        'age' => $requsest->input('age'),
       /* $grade = 12,
        'grade' => $grade,*/
        /*'password' => bcrypt($requsest->input('password')),*/    
         'user_id' =>   Auth::user()->getId(),
        
      ]); 
      return redirect('subusers');
  }
  
  
  
  public function postPassword(Request $requsest)
  {
     $user =  Auth::user();
     $user->password  = bcrypt($requsest->input('password'));
     $user ->save();
      return redirect('subusers');
  }
  public function getPassword()
  {
      return view('pages.payment.join');
    
  }
   public function getChangePassword()
  {

      return view('Auth.changePassword');
  }


  public function postemail(Request $requsest)
  {
     $user =  Auth::user();
     $user->email  = ($requsest->input('email'));
     $user ->save();
      return redirect('subusers');
  }
  public function getchangeEmail()
  {

      return view('Auth.changeEmail');
  }

  public function getSecurtyCheck()
    {
        $messages = array(
            '1' => ''
        );
        if (Session::get('firstlogin') == true) {
            Session::set('firstlogin', false);
        }

        if (Auth::check() && Auth::user()->subscribed()) {
            return view('Auth.SecurityCheck')->with('messages', $messages);
        } else if(Auth::check()) {
            return view('pages.payment.join')->with('user', Auth::user());
        }
    }
  public function postSecurtyCheck(Request $requsest)
  {
     
      if(Hash::check($requsest->input('password'),Auth::user()->password)) {
          $messages =array(
'1'  =>''
   );
          $data = array(
'user'  =>Auth::user(),
'users'   => Auth::user()->users()
);
          if(null !== $requsest->input('redirect_to')) {
      if($requsest->input('redirect_to') == 'account') {
        $this->user = Auth::user();
        $data = array(
        'user'  =>$this->user,
        'users'   => $this->user->users(),
        'invoices' => $this->user->invoices()
        );
        //return view('pages.payment.'. $requsest->input('redirect_to'))->with('data', $data);
    return redirect('/'. $requsest->input('redirect_to'))->with('data', $data);
      } elseif($requsest->input('redirect_to') == 'Activity') {
        $logs = Auth::user()->logs();
        //return View::make('Logs.show', ['logs' => $logs]);
    return redirect('/'. $requsest->input('redirect_to'))->with('logs', $logs);
      }
      //return view('pages.Account.'. $requsest->input('redirect_to'));
    return redirect('/'. $requsest->input('redirect_to'));
      }
      
      if(Auth::user()->subscribed())
          {
              //return view('pages.payment.account')->with('data', $data);
        return redirect('/account')->with('data', $data);
          }else{
              //return view('pages.payment.join')->with('user',  Auth::user());
        return redirect('/join')->with('user', Auth::user());
          }
        
      } else {
          $messages['1'] = 'Fel lösenord';
          return view('Auth.SecurityCheck')->with('messages', $messages);
      }
    
   
  }
  public function AddLog($action,$email,$userid)
  {
      $this->Logs = new Logs();
      $this->Logs->action = $action;
      $this->Logs->user_id =$userid;
      $this->Logs->username =$email;
      $this->Logs->save();
      return null;
  }



    /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function feedback(Request $request)
    {
        $this->validate($request, [
          'massages' => 'min:10'
        ]);

        $data =  array(
          'fullname' => $request->fullname,
          'email' => $request->email,
          'massages' => $request->massages
        );
        //Mail::send($data, function($massages){
        //    $massages->from($data['email']);
        //    $massages->to('dagmawi@screenwork.se');
        //    $massages->subject('freeback');
        //});
        return redirect()->back()->with('info', 'Tack för din feedback!');
    }
}