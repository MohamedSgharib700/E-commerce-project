<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Messages;
use App\Conversation;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'profile_picture','lang','email_token','type'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function chats(){
        return $this->hasMany('App\Chats','user_id');
    }
    
    public function getMessages()
    {
        // $ne = Messages::first();
        // dd($ne);
        return $this->hasMany('App\Messages','id');
    }

    public function getFavorites()
    {
        return $this->belongsToMany('App\Posts', 'favorites', 'user_id', 'post_id');
    }

    public function getMessagesFrom()
    {
        return Messages::where('from_id',$this->id)->select('to_id')->get()->groupBy('to_id');
        //return $this->hasMany('App\Messages','from_id');
    }

    public function getMessagesTo()
    {
        return Messages::where('to_id',$this->id)->select('from_id')->get()->groupBy('from_id');
        //return $this->hasMany('App\Messages','to_id');
    }

    public function getConversation()
    {
        return $this->hasMany('App\Conversation','id');
        //$conversations = Conversation::where('user_one',$this->id)->get();
        //dd($conversations);
        //return $conversations;
        return View('admin.users.messages', compact('conversations'));
    }

    public function getBills()
    {
        return $this->hasMany('App\Bills','user_id');
    }


    public function getSubscriptions()
    {
        return $this->hasMany('App\UserSubscriptions','user_id');
    }

    public function getCommerical()
    {
        return $this->hasOne('App\CommercialUsers','user_id');
    }

    public function isCommercial()
    {
        if($this->getCommerical !== null){
            return true;
        }
        return false;
    }

    public function getPosts()
    {
        return $this->hasMany('App\Posts','user_id');
    }

    public function roles ()
    {
        return $this->belongsToMany('App\Role','role_users','user_id','role_id');
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
        $roles = json_decode(auth()->user()->roles()->first()->permissions, true);
        $secondary_roles = json_decode(auth()->user()->permissions, true);
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
    public function Posts(){
        return $this->belongsToMany('App\Posts','post_user','user_id','post_id')->withTimestamps();
    }
}
