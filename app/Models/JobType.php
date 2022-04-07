<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class JobType extends Model
{
    

   
    protected $table = 'job_list';
    protected $primaryKey = 'id ';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'modified_at';


    protected $fillable = [
       
        'id',
        'job_tittle',
        'job_sectors',
        'sub_category',
        'job_category',
		'job_experience',
		'serivce_charge',
		'requried_skills',
		'description',
		'status',
		'added_at',
		'modified_at'
    ];


}
