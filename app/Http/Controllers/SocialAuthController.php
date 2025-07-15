<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\SocialAuthInterface;

class SocialAuthController extends Controller
{
    protected $socialAuthRepository;

    public function __construct(SocialAuthInterface $socialAuthRepository){
        $this->socialAuthRepository = $socialAuthRepository;
    }

    public function redirectToGithub(){
        return $this->socialAuthRepository->redirectToGithub();
    }

    public function handleGithubCallback(){
        return $this->socialAuthRepository->handleGithubCallback();
    }


}
