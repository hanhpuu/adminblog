<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
	'body','created_at','updated_at','created_by','updated_by','post_id',
    ];
}
