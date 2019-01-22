<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    protected $table = 'chats';
    
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
    
    public function rooms(){
        return $this->belongsTo('App\Rooms','room_id');
    }
}
