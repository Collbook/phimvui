<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkFilm extends Model
{
    protected $table='link_films';
    protected  $guarded =[];

    public function films()
    {
        return $this->belongsTo('App\Models\Film', 'film_id', 'id');
    }
}
