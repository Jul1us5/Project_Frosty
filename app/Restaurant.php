<?php

namespace App;

use Validator;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }
}
