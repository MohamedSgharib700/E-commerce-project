<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageInquire extends Model
{
    protected $table = 'messages_inquires';
    
    protected $fillable = ['sender_name','sender_phone','messages'];
    
}
