<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name', 'address', 'phone','email', 'siret', 'photoInside', 'photoOutside', 'latitude', 'longitude','city_id','category_id','subcategory_id','manager_id'
    ];

    public function manager() {
        return $this->belongsTo(User::class);
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
