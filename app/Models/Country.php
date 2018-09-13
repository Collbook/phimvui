<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='countries';

    public function films()
    {
    	return $this->belongsToMany('App\Models\Film','country_film','country_id','film_id');
    }
}
