<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $table = 'posts';
    protected $fillable = ['title', 'short','description', 'address', 'seller_name', 'seller_email', 'longitude', 'latitude',
     'price', 'category_id', 'user_id', 'status', 'type', 'seller_type', 'search_sentence', 'country', 'city', 'isApproved', 'Brand', 'Model', 'production', 'License', 'Mileage', 'color', 'TypeCar', 'EngineCapacity', 'MotionVector', 'Fuel', 'Sunroof', 'Traction'];
    protected $casts = [
        'id' => 'int',
        'search_sentence' => 'array'
    ];
    public function category()
    {
        return $this->belongsTo('App\Categories');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\Post_Photos','post_id');
    }

    public function getPhotos()
    {
        return $this->hasMany( 'App\Post_Photos', 'id', 'post_id');
    }

    public function getFeatures()
    {
        return $this->hasMany('App\PostFeatures', 'post_id');
    }
}
