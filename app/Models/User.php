<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPassword;

class User extends Model implements AuthenticatableContract, BillableContract, CanResetPassword
{
    use Authenticatable;
    use Billable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email', 
        'password',
        'location',
        'country',
        'state'
        
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
      protected $hidden = [
          'password', 
          'remember_token',
      ];
      
      public function getId()
      {
          if($this->id ){
              // Store a piece of data in the session...
              (['userid' => $this->id]);
             
              return "{$this->id}";
          }
          return null;
      }
      
      public function getName()
      {
          if($this->first_name && $this->last_name){
             
                  return "{$this->first_name} {$this->last_name}";
             
              
          }

          if($this->first_name)
          {
              return $this->first_name;
          }

          return null;
      }

      public function getNameOremail()
      {
          return $this->getName() ?: $this->email;
      }
      public function getFirstNameOremail()
      {
          return $this->first_name ?: $this->email;
      }
       public function getEmail()
      {
          return $this->email ?: $this->email;
      }
      //public function comments()
      //{
      //    return $this->hasMany('Subuser');
      //}
      
      public function usersNames()
      {
           
          
          $users = $this->hasMany('\App\Models\Subuser', 'user_id');
          $contracts = Subuser::where('user_id', '=', $this->getId())->get();
         $text = '';
          foreach($contracts as $engagement) {
          //    echo $engagement->id;
             $text = $text.$engagement->username;
             $text = $text.'  ';
          }
          return $text;
      }
      public function users()
      {
          
          
          $users = Subuser::where('user_id', '=', $this->getId())->get();
         
          return  $users;
      }
      public function userbyId($id)
      {
          
          
          $user = Subuser::where('id', '=', $id)->first();
    //we make sure the user is modifing an account who belongs to him
          if($user->user_id != $this->id)
          {
          $user = null;
          }
          
          return  $user;
      }
      
      public function getSelectedUser()
      {
          if($this->first_name && $this->last_name){
              if(   session('subuser') == "")
              {
                  return "{$this->first_name} {$this->last_name}";
              }else{
                  $SelectedUser = session('subuser');
                  
                  
                  return  $SelectedUser->username;;
              }
              
          }

          if($this->first_name)
          {
              return $this->first_name;
          }

          return null;
      }
      public function logs()
      {
          
          if($this->is_admin())
          {
              $logs = Logs::get();
          }else{
              $logs = Logs::where('user_id', '=', $this->getId())->get();
          }
        
          
          return  $logs;
      }
      public function orderPost(Request $request)
      {
          $user = User::find(3);
          $input = $request->all();
          $token = $input['stripeToken'];
          
          try {
              $user->subscription($input['plane'])->create($token,[
                      'email' => $user->email
                  ]);
              return back()->with('success','Subscription is completed.');
          }
          catch (Exception $e) {
              return back()->with('success',$e->getMessage());
          }
          
      }
      
      public function getEmailForPasswordReset()
		
    {
		
        return  $this->email;
}
      public function is_admin()
      {
          return $this->is_admin;
      }
      public function Log($action)
      {
          $this->Logs = new Logs();
          $this->Logs->action = $action;
          $this->Logs->user_id = $this->id;
          $this->Logs->username = $this->email;
          $this->Logs->save();
          return null;
      }
}