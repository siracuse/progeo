<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
