<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSubscription extends Model
{
   
    protected $table = 'email_subscribers_list';
    protected $primaryKey = 'subscriber_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subscriber_id',
        'email_id',
        'added_at'
    ];


}
