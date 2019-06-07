<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public $table = 'blog_category';

    public function posts()
    {
    	return $this->hasMany(BlogPost::class,'BP_CATID','id');
    }

}
