<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class JobType extends Model
{
    

   
    protected $table = 'job_list';
    protected $primaryKey = 'job_id  ';
    
      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'modified_at';


    protected $fillable = [
       
        'job_id ',
        'job_title',
        'job_sectors',
        'sub_category',
        'job_category',
		'job_experience',
		'amount',
		'requried_skills',
		'description',
		'status',
		'added_at',
		'modified_at'
    ];


}
