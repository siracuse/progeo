<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function stores(){
        return $this->hasMany(Store::class);
    }

    public function subCategories(){
        return $this->hasMany(Subcategorie::class);
    }
}
