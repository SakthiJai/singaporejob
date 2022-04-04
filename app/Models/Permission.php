<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    

   
    protected $table = 'groups';
    protected $primaryKey = 'id ';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';


    protected $fillable = [
       
        'id ',
        'group_name',
        'members',
		'permission',
		'items',
		'category',
		'warehouse',
		'elements_name',
		'product',
		'orders',
		'company',
		'checkAll',
		'active',
        'added_at',
        'updated_at'
    ];

    
}
