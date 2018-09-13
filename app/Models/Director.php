<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table='directors';

    public function films()
    {
    	return $this->hasMany('App\Models\Film');
    }

    public function countries()
    {
        return $this->belongsTo('App\Models\Country','id_country','id');
    }

}
