<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table = 'categories';
    protected $fillable = ['name_ar', 'name_en', 'parent_id', 'icon', 'status', 'photo'];
    protected $visible = ['id', 'name_ar', 'name_en', 'parent_id', 'icon', 'photo'];
    
    public function getSubCategories()
    {
    	return $this->hasMany('App\Categories', 'parent_id');
    }

    public function getPosts()
    {
    	return $this->hasMany('App\Ad','App\Posts');
    }

    public function getMainCategory()
    {
        return $this->belongsTo('App\Categories');
    }

    public function filtersgroups()
    {
        return $this->belongsToMany('App\FiltersGroups', 'categories_filters_groups');
    }

}
