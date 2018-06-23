<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RoleRepository::class, \App\Repositories\RoleRepositoryEloquent::class);
        
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductCategoryRepository::class, \App\Repositories\ProductCategoryRepositoryEloquent::class);

        $this->app->bind(\App\Repositories\SizeRepository::class, \App\Repositories\SizeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ColorRepository::class, \App\Repositories\ColorRepositoryEloquent::class);
        
        $this->app->bind(\App\Repositories\PageRepository::class, \App\Repositories\PageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PageTranslationRepository::class, \App\Repositories\PageTranslationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PageBlockTranslationRepository::class, \App\Repositories\PageBlockTranslationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BlocksRepository::class, \App\Repositories\BlocksRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PageBlockRepository::class, \App\Repositories\PageBlockRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SliderRepository::class, \App\Repositories\SliderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SliderTranslationRepository::class, \App\Repositories\SliderTranslationRepositoryEloquent::class);
        //:end-bindings:
    }
}
