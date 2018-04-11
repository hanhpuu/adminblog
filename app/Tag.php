<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use DB;

class Tag extends Model
{
    protected $fillable = ['name'];
    
    
    public function posts()
    {
	return $this->belongsToMany('App\Post');
    }
    
    public static function addTag($post, $tags)
    {
	$allTag = self::all();
	$tagIdsToImport = [];
	foreach ($tags as $tag) {
	    $tag = trim($tag);
	    $dbTag = self::matchDbTag($tag, $allTag);
	    if($dbTag === FALSE) {
		$tagId = self::create(['name' => $tag])->id;		
	    } else {
		$tagId = $dbTag->id;
	    }
	    $tagIdsToImport[] = $tagId;
	}
	
	if(count($tagIdsToImport)) {
	     $post->tags()->sync($tagIdsToImport);
	}
	
    }
    
    public static function matchDbTag($tag, $allTag) 
    {
	foreach ($allTag as $oldTag) {
	    if($oldTag->name == $tag) {
		return $oldTag;
	    }
	}
	return FALSE;
	
    }
}
