<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SignIn extends Model
{
    

   
    protected $table = 'sign_in';
    protected $primaryKey = 'id';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';
      


    protected $fillable = [
       
        'id',
        'name',
        'email',
		'password',
		'mobile_no',
        'added_at',
        'updated_at'
    ];


}