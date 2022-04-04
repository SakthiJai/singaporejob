<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessages extends Model
{
   
    protected $table = 'chat_messages';
    protected $primaryKey = 'chat_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chat_id', 'counselling_id', 'from_user_id', 'to_user_id', 'is_staff_reply', 'message', 'attachment_url', 'sent_at'
    ];

   
}
