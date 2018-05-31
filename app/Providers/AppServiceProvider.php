<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;
use App\Models\Cart; //mua giỏ hàng
use Session;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\CategoryComposer;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
    public function boot()
    {
        $user = exec('whoami');
        $user = str_slug($user);
        \Log::getMonolog()->popHandler();
        \Log::useDailyFiles(storage_path('/logs/laravel-').$user.'.log');

        //chia sẻ dulieu = gán biến $view trên header
        View::composer(
            [
                'frontend.layouts.header'
            ], CategoryComposer::class
        );

        //chia sẻ dulieu = gán biến $view trên header
        //view()->composer('*',"App\Http\ViewComposers\CategoryComposer");

        // Admin chia se login auth
        View::composer([
            'admin.layouts.partials.menu',
            'admin.dashboard.index',
        ], function ($view) {
            $arr = \Auth::user()->getPermissions()->pluck('slug')->toArray();
            $view->with('composer_auth_permissions', $arr);
        });


        //chia se locale da ngon ngu 
        View::composer('*', function ($view){
            $view->with('composer_locale', \App::getLocale());
        }); 
        
        Schema::defaultStringLength(191); 
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
