<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name', 'address', 'phone','email', 'siret', 'photoInside', 'photoOutside', 'latitude', 'longitude','city_id','category_id','subcategory_id','user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function userSecond() {
        return $this->belongsToMany(User::class)->withPivot('codePromo', 'favoris');
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function promotions(){
        return $this->hasMany(Promotion::class);
    }

}
