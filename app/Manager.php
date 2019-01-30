<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function stores(){
        return $this->hasMany(Store::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function promotions(){
        return $this->hasMany(Promotion::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function subCategorie(){
        return $this->belongsTo(Categorie::class);
    }

}
