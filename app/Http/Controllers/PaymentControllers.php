<?php
namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Exception;
use Carbon;
use Session;
/**
* Homecontroller
*/
class PaymentControllers extends Controller
{
 
  protected $user;  
  public function __construct()
  {
      $this->user = Auth::user();
  }
  public function getAccounts()
  {
   
      if(Auth::check() && ($this->user->subscribed() || $this->user->subscribed())){
       
        $data = array(
        'user'  =>$this->user,
        'users'   => $this->user->users(),
        'invoices' => $this->user->invoices()
      );
      return view('pages.payment.account')->with('data', $data);
      }else{
        return view('pages.payment.join')->with('user', $this->user);
      }
  }

  
  public function postjoin(Request $request)
  {
    $input = $request->all();
    $token = $input['stripeToken'];
    try {
            //add card to user
        $this->user->subscription($input['plane'])->withCoupon($input['coupon'])->create($token,[
                'email' => $this->user->email
        ]);
            return redirect('subusers')->with('info','Ditt medlemskap är nu aktivt.');
    } catch (Exception $e) {
        return back()->with('info',$e->getMessage());
    }
  }
  public function canceljoin()
  {
    $this->user->subscription()->cancel();
    return back()->with('info','Ditt medlemskap är nu avslutat.');
  }
  public function upgrade()
  {
        $this->user->subscription('test')->swap();
    return back()->with('info','Ditt medlemskap har nu blivit uppgraderat. Du har nu obegränsand tillgång till Peppy Pals.');
  }



  public function getSettings()
  {
      if(Auth::check() && ($this->user->subscribed() || $this->user->subscribed())){
       
        $data = array(
        'user'  =>$this->user,
        'users'   => $this->user->users(),
        'invoices' => $this->user->invoices()
      );
          return view('pages.payment.settings')->with('data', $data);
     }
  }


  public function start()
  {
    if(Auth::check()){
        if(Auth::user()->is_admin()){
            return view('adminpanel.admin.start');
        }else{
           return redirect()->back()->with('info', 'only admin');
        }
    }else{
       return redirect('/'); 
    }    
  }
}