<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function stores() {
        return $this->hasMany(Store::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
