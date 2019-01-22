<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
     public function users ()
    {
        return $this->belongsToMany('App\User','role_users','role_id','user_id');
    }

     public function admins ()
    {
        return $this->belongsToMany('App\Admin','role_admins','role_id','admin_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
}
