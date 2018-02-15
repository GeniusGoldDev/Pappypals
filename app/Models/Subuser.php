<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Subuser extends Model implements AuthenticatableContract
{
    use Authenticatable;
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'subuser';
    public $Logs = NULL;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'birthdate',
        'userimage',
        'user_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
      protected $hidden = [
          'remember_token',
      ];
      
      public function getName()
      {
          if($this->username){
              return "{$this->username}";
          }

          if($this->username)
          {
              return $this->username;
          }

          return null;
      }
      public function Log($action)
      {
          $this->Logs = new Logs();
          $this->Logs->action = $action;
          $this->Logs->user_id = $this->user_id;
          $this->Logs->username = $this->username;
          $this->Logs->save();
          
      }


}