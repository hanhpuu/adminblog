<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
	'body','created_at','updated_at','created_by','updated_by','post_id',
    ];
    
    public function user()
    {
	return $this->belongsTo('App\User','created_by');
    }
//  this is the author
    public function post()
    {
	return $this->belongsTo('App\post');
    }
    
//  this is the editor
    public function editor()
    {
	return $this->belongsTo('App\post','updated_by');
    }
}
