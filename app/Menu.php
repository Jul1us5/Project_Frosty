<?php

namespace App;
use Validator;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function restaurant()
    {
        return $this->hasMany('App\Restaurant', 'menu_id', 'id');
    }
    public function allMenu()
    {
        return $this->hasMany('App\Menu', 'menu_id', 'id');
    }
 
}
