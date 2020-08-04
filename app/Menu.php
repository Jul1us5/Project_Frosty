<?php

namespace App;
use Validator;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function restaurant()
    {
        return $this->hasMany('App\restaurant', 'menu_id', 'id');
    }
 
}
