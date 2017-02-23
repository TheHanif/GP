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

         Route::bind('product', function($product, $route){

             $cacheKey = MD5($route->parameters['parent'].$route->parameters['product']);
             // Get cached item
             if (env('CACHE_SINGLE_PRODUCT', false) && Cache::has($cacheKey)) {
                 return Cache::get($cacheKey);
             }

             // Get Single product
             $product = \Modules\Product\Entities\Product::where('slug', $product)
                 ->active()->firstOrFail();

             $status = true;

             // Check parent by requested URL
             if (!$this->itemParentAncestors(\Modules\Category\Entities\Category::class, $route->parameters['parent'], 'cat_'.$cacheKey)){
                 $status = false;
             }

             if ($status){

                 // Don't cache if you want to display stock count in single product view
                 if(env('CACHE_SINGLE_PRODUCT', false))
                 Cache::put($cacheKey, $product, env('CACHE_ITEM_URL', 60));

                 return $product;
             }

         });
        
        Route::bind('category', function($value, $route){

            // Generate unique cache key for value
            $cacheKey = 'pageURI_'.MD5($value);

            return $this->itemParentAncestors(\Modules\Category\Entities\Category::class, $value, $cacheKey);

        });
    }


    function itemParentAncestors($model, $value, $cacheKey){
        // Get cached item
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        if($value == "/"){ $value = "home"; };

        // Create array
        $explodedPage = explode("/",$value);

        // Get it from DB using last
        $item = $model::select('id', 'slug', 'name', 'parent_id')->where('slug', last($explodedPage))->active();

        // 404 if not found
        if(!$item->exists()){
            return false;
        }

        // Get first for array
        $item = $item->first();

        // Ancestors for get parents
        $ancestors = $item->ancestors;

        // Merge requested category in parents array
        $ancestors = $ancestors->merge(collect([$item]));

        $sections=array();
        foreach($ancestors as $ancestor)
        {
            $sections[]=$ancestor->slug;
        }

        // If heirarchy matched the URI
        if(implode("/",$sections)==$value){

            // Add item to cache
            Cache::put($cacheKey, $item, env('CACHE_ITEM_URL', 60));

            return $item;
        }else{
            return false;
        }
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
