<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CRPersonalInfo extends Model
{
   
    protected $table = 'cir_personal_info';
    protected $primaryKey = 'id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'report_id', 'full_name', 'first_name', 'last_name', 'date_of_birth', 'gender', 'age', 'total_income', 'occupation'
    ];


}
