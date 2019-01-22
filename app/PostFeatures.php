<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostFeatures extends Model
{
    //
    protected $table = 'post_features';
    protected $fillable = ['type', 'post_id'];

    public function getPost()
    {
        return $this->belongsTo('App\Posts', 'post_id');
    }
}
