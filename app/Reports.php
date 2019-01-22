<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    //
    protected $table = 'reports';
    protected $fillable = ['post_id', 'type', 'status', 'seen'];
}
