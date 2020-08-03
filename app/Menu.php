<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function getRestaurant()
    {
        return $this->belongsTo('App\Restaurant', 'restaurant_id', 'id');
    }
 
}
