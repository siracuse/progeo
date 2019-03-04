<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function stores() {
        return $this->hasMany(Store::class);
    }
    public function subcategories() {
        return $this->hasMany(Subcategory::class);
    }
}




