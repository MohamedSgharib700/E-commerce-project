<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filters extends Model
{
    protected $table = 'filters';
    protected $fillable = ['name', 'type', 'icon', 'group_id', 'parent_id'];


    public function filterGroup()
    {
    	return $this->belongsTo('App\FiltersGroups');
    }

    public function getParentFilter()
    {
    	return $this->belongsTo('App\Filters');
    }
    
    public function getChildFilters()
    {
    	return $this->hasMany('App\Filters');
    }
}
