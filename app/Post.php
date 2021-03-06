<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
	'title','body','created_at','updated_at','created_by','updated_by','cover_image',
    ];
    
    public function comments()
    {
	return $this->hasMany('App\Comment');
    }
//  this is the author's 
    public function user()
    {
	return $this->belongsTo('App\User', 'created_by');
    }
    
//  This is the editor
    public function editor()
    {
	return $this->belongsTo('App\User', 'updated_by');
    }
//  for search  
    public static function search($s) {
	return self::where('title','like',"%$s%")
		->orWhere('body','lile',"%$s%")->get();
    }
    
    public function tags()
    {
	return $this->belongsToMany('App\Tag');
    }
    
    public function categories()
    {
	return $this->belongsToMany('App\Category');
    }
}

