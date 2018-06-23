<?php

namespace App\Providers;

use App\Http\ViewComposers\CategoryComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $locales = \LaravelLocalization::getSupportedLocales();
            $view->with('composer_locales', $locales);
            $view->with('composer_locale', \App::getLocale());
        });

        // Admin
        View::composer([
            'admin.layouts.partials.menu',
            'admin.dashboard.index',
        ], function ($view) {
            $arr = \Auth::user()->getPermissions()->pluck('slug')->toArray();
            $view->with('composer_auth_permissions', $arr);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
