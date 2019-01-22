<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminGroups extends Model
{
    protected $table 	= 'admin_groups';
    protected $fillable = ['name','premissions'];

    public function getMembers()
    {
    	return $this->hasMany('App\Admins');
    }

}
