<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesFiltersGroups extends Model
{
    //
    protected $table = 'categories_filters_groups';
    protected $fillable = ['categories_id', 'filters_groups_id'];

    public function categories(){
        return $this->belongsTo('App\Categories');
    }

    public function filtersgroups(){
        return $this->belongsTo('App\FiltersGroups');
    }

}
