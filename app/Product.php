<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    public function categoryId() {
        return $this->belongsTo('App\Category');
    }
}
