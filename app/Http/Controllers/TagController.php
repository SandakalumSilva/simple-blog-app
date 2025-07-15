<?php

namespace App\Http\Controllers;
use App\Interfaces\TagInterface;

use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagRepository;

    public function __construct(TagInterface $tagRepository){
        $this->tagRepository = $tagRepository;
    }

    public function getTags(){
        return $this->tagRepository->getTags();
    }
}
