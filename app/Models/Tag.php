<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag'
    ];

    public function tag(){
        return $this->belongsToMany(Post::class, 'post_tags','tag_id','post_id');
    }
}
