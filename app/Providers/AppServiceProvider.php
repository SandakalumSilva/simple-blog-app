<?php

namespace App\Providers;

use App\Interfaces\PostInterface;
use App\Interfaces\SocialAuthInterface;
use App\Interfaces\TagInterface;
use App\Repositories\PostRepository;
use App\Repositories\SocialAuthRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostInterface::class, PostRepository::class);
        $this->app->bind(TagInterface::class, TagRepository::class);
        $this->app->bind(SocialAuthInterface::class, SocialAuthRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
