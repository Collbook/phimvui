<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table='tags';
    protected $fillable = [
        'name',
        'slug'
    ];

    public function films()
    {
    	return $this->belongsToMany('App\Models\Film','film_tag','tag_id','film_id');
    }
}
