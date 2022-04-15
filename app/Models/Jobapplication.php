<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Jobapplication extends Model
{
    

   
    protected $table = 'job_application';
    protected $primaryKey = 'job_app_id ';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';


    protected $fillable = [
       
        'job_app_id ',
        'first_name',
        'last_name',
		'dob',
		'mother_name',
		'father_name',
		'address',
		'email_id',
		'gender',
		'mobile_number',
		'whatsapp_number',
		'maritial_status',
		'age',
		'status',
		'application_added_by',
		'application_modified_by',
        'added_at',
        'updated_at'
    ];

    
}
