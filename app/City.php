<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function stores() {
        return $this->hasMany(Store::class);
    }
}
