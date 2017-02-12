<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Cache;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $namespaceFrontend = 'App\Http\Controllers\Frontend';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        // Route::bind('category', function($category){
        //     return \Modules\Category\Entities\Category::where('slug', $category)->first();       
        // });
        
        Route::bind('category', function($value, $route){

            if($value == "/"){ $value = "home"; };

            // Create array
            $explodedPage = explode("/",$value);

            // Get it from DB using last
            $category = \Modules\Category\Entities\Category::select('id', 'slug', 'parent_id')->where('slug', last($explodedPage));

            // 404 if not found
            if(!$category->exists()){
                \App::abort(404);
            }

            // Get first for array
            $category = $category->first();

            // Ancestors for get parents
            $ancestors = $category->ancestors;

            // Merge requested category in parents array
            $ancestors = $ancestors->merge(collect([$category]));
            
            $sections=array();
            foreach($ancestors as $ancestor)
            {
                $sections[]=$ancestor->slug;
            }
            
            // If heirarchy matched the URI
            if(implode("/",$sections)==$value){
                // echo $category->name . '<br>';
                // echo 'Products here';
                // return;
                return $category;
            }else{
                \App::abort(404);
                //Else Redirect
            }
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespaceFrontend)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
