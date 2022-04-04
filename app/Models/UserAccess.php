<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserAccess extends Model
{
    

   
    protected $table = 'user_access';
    protected $primaryKey = 'id';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';


    protected $fillable = [
       
        'id ',
        'roles_id',
        'menu_id',
		'read',
		'add',
		'update',
		'delete',
		'added_at',
		'updated_at'
    ];

    
}
