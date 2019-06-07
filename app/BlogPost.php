<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BlogPost extends Model
{
	
	public $table = 'blog_post';

	public function files(){
	
		return $this->hasMany(BlogFile::class,'bf_idpost','id');
		
	}


	public function tags(){

		return $this->belongsToMany('App\BlogTag','blog_post_tag','btc_postid','btc_tagid');
	} 

	

}