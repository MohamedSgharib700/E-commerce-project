<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedSearch extends Model
{
    protected $table = 'saved_searches';
    protected $fillable = ['searchUrl', 'user_id','searchWord'];
}
