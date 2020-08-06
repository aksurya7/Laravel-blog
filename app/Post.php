<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id','title','image','description','autor'];

    public function category(){
        return $this->belongsTo('category');
    }
    
}
