<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actors';

    public function films ()
    {
    	return $this->belongsToMany('App\Models\Film','actor_film','actor_id','film_id');
    }
    //  1 actor thuộc 1 countries 
    // 1 countries có n actor = > ( chữ nhiều nằm ở bẳng actor => khóa ngoại id_country nằm ở bảng actor)
    public function countries()
    {
        return $this->belongsTo('App\Models\Country','id_country','id');
    }
}
