<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';

    public function customers()
    {
    	return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    public function films()
    {
    	return $this->belongsTo('App\Models\Film', 'film_id');
    }
}
