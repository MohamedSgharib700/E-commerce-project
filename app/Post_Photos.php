<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Photos extends Model
{
    //
    protected $table = 'post__photos';
    protected $fillable = ['post_id', 'photolink'];
 
    public function post()
    {
        return $this->belongsTo('App\Posts');
    }
}
