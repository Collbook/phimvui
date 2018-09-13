<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table='films';
    protected $guarded =[];
    public function actors()
    {
        return $this->belongsToMany('App\Models\Actor','actor_film','film_id','actor_id');
    }

    public function admins()
    {
    	return $this->belongsTo('App\Models\Admin','admin_id','id');
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Models\Category', 'category_film', 'film_id', 'category_id');
    }

    public function countries()
    {
    	return $this->belongsToMany('App\Models\Country','country_film','film_id','country_id');
    }

    public function directors()
    {
    	return $this->belongsToMany('App\Models\Director');
    }

    public function link_films()
    {
        return $this->hasMany('App\Models\LinkFilm','film_id','id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','film_tag','film_id','tag_id');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Models\Language','film_language','film_id','language_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
