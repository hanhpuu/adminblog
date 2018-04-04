<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
public function scopeSearch($query, $s) {
    return $query->where('title','like','%'.$s. '%')
	    ->orWhere('body','lile','%'.$s. '%');
    }
}
