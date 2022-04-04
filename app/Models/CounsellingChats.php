<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounsellingChats extends Model
{
   
    protected $table = 'counselling_chats';
    protected $primaryKey = 'counselling_id';

    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'counselling_id', 'user_id','cir_account_id', 'chat_title', 'created_at', 'last_message_at'
    ];

    public function Message()
    {
        return $this->hasMany(ChatMessages::class,'counselling_id');
    }
}
