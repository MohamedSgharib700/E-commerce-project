<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','group_id','phone','title','photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group()
    {
        return $this->belongsTo('App\AdminGroups');
    }

    public function roles ()
    {
        return $this->belongsToMany('App\Role','role_admins','admin_id','role_id');
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles))
        {
            foreach ($roles as $role) 
            {
                if($this->hasRole($role))
                {
                   return true;
                }
            }
        }
        else
        {
            if($this->hasRole($roles))
            {
                return true;
            }
        }
        return false;
    }

    public static function hasRole ($role)
    {
        $roles = json_decode(auth()->admin()->roles()->first()->permissions, true);
        $secondary_roles = json_decode(auth()->admin()->permissions, true);
        dd(json_decode($secondary_roles));

        if(array_key_exists($role, $roles) && $roles[$role] === true)
        {
            return true;
        }

        if(array_key_exists($role, $secondary_roles) && $secondary_roles[$role] === true)
        {
            return true;
        }

        foreach ($roles as $key => $value) {
            if ((str_is($role, $key) || str_is($key ,$role)) && $value === true) {
                return true;
            }
        }
        foreach ($secondary_roles as $key => $value) {
            if ((str_is($role, $key) || str_is($key ,$role)) && $value === true) {
                return true;
            }
        }
        return false;
    }
}
