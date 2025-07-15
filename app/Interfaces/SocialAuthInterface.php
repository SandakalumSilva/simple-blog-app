<?php 
namespace App\Interfaces;

interface SocialAuthInterface{
    public function redirectToGithub();
    public function handleGithubCallback();
}