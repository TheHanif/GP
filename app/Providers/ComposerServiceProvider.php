<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Main navigation bar
        View::composer( 'frontend.partials.navigation', 'App\Http\ViewComposers\NavigationComposer');

        // Brands widget
        View::composer( 'brand::widgets.carousel', 'Modules\Brand\Http\ViewComposers\BrandWidgetComposer');

        // Manufacturer widget
        View::composer( 'manufacturer::widgets.carousel', 'Modules\Manufacturer\Http\ViewComposers\ManufacturerWidgetComposer');
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
