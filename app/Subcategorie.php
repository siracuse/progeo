<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    public function stores(){
        return $this->hasMany(Store::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
