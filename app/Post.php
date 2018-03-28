<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
	'title','body','created_at','updated_at','created_by','updated_by','cover_image',
    ];
}
