<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function users() {
        return $this->belongsToMany(User::class)->withPivot('rating', 'comment');
    }

    public function store() {
        $this->belongsTo(Store::class);
    }
}
