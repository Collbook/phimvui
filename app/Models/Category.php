<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function films()
    {
    	return $this->belongsToMany('App\Models\Film', 'category_film', 'category_id', 'film_id');
    }

    public function cate_types()
    {
    	return $this->belongsToMany('App\Models\CateType', 'cate_type_cates', 'category_id', 'cate_type_id');
    }
}
