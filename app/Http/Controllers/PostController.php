<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Interfaces\PostInterface;

use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;
    public function __construct(PostInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function addPosts()
    {
        return $this->postRepository->addPosts();
    }

    public function savePost(PostRequest $request)
    {
        return $this->postRepository->savePost($request);
    }

    public function managePost(Request $request)
    {
        return $this->postRepository->managePost($request);
    }

    public function changeStatus(Request $request){
        return $this->postRepository->changeStatus($request);
    }
}
