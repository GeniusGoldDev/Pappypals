<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Logs extends Model
{
    //
    protected $table = 'Logs';
    public function __construct (){
      
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'username', 
        'action', 
        'time', 
        
       
    ];
    

}
