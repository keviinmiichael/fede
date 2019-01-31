<?php

namespace App\Providers;

use App\CustomClasses\LangMap;
use App\Evento;
use App\Imagen;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    private static $categories;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //admin
        // view()->composer('admin/*/form*', 'App\Http\ViewComposers\FormComposer');

        //front
        // view()->composer('front/partials/home/slider', function ($view)
        // {
        //     $view->with('sliderHome', \App\Slider::home()->images);
        // });

        // view()->composer('front/partials/navbar', function ($view)
        // {
        //     $categories = \App\Category::orderBy('value')->with('subcategories')->get();
        //     $view->with('categories', $categories);
        // });
        //
        // view()->composer('front/partials/footer', function ($view)
        // {
        //     $view->with('categories', \App\Category::orderBy('value')->get());
        // });
        //
        // view()->composer('front/products/index', function ($view)
        // {
        //     $view->with('categories', \App\Category::with('subcategories')->orderBy('value')->get());
        // });
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
