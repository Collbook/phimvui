<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table='languages';
    protected $guarded =[];
    public function films()
    {
        return $this->belongsToMany('App\Models\Film','film_language','language_id','film_id');
    }
}
