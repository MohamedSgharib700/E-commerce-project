<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiltersGroups extends Model
{
    protected $table 	= 'filters_groups';
    protected $fillable = ['group_name', 'type', 'parent_id'];

    public function getFilters()
    {
        return $this->hasMany('App\Filters', 'group_id');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Categories', 'categories_filters_groups');
    }
    
    public function getParentGroup()
    {
    	return $this->belongsTo('App\FiltersGroups');
    }
    
    public function getChildGroup()
    {
    	return $this->hasMany('App\FiltersGroups');
    }

}
