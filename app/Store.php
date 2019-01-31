<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function manager() {
        return $this->belongsTo(Manager::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subCategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function opinions(){
        return $this->hasMany(Opinion::class);
    }
}
