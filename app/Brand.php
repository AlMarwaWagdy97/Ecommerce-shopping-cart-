<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $guarded = [];


    public function categories(){
        return $this->belongsToMany(Categorie::class, 'categorie_brands6', 'brand_id','category_id');
    }
}
