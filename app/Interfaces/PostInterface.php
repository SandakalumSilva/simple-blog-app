<?php 
namespace App\Interfaces;

interface PostInterface{
    public function addPosts();
    public function savePost($request);
    public function managePost($request);
    public function changeStatus($request);
}