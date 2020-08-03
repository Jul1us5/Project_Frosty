<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function getMenu()
    {
        return $this->hasMany('App\Menu', 'restaurant_id', 'id');
    }
 
}
