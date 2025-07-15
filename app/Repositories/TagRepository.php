<?php 
namespace App\Repositories;

use App\Interfaces\TagInterface;
use App\Models\Tag;

class TagRepository implements TagInterface{
    public function getTags(){
        $tags = Tag::all();
        return response()->json($tags);
    }
}