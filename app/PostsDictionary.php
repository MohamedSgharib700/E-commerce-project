<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsDictionary extends Model
{
    //
    protected $table = 'posts_dictionaries';
    protected $fillable = ['hash', 'post_id'];
}
