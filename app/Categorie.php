<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    protected $guarded = [];

    public function brands(){
        return $this->belongsToMany(Brand::class, 'categorie_brands','category_id','brand_id');
    }
}
