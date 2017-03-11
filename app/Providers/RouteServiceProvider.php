<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Cache;
use Modules\Brand\Entities\Brand;
use Modules\Manufacturer\Entities\Manufacturer;

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

         Route::bind('brand', function($slug, $route){
             // Generate unique cache key for value
             $cacheKey = 'brandURI_'.MD5($slug);

             // Get cached item
             if (Cache::has($cacheKey)) {
                 return Cache::get($cacheKey);
             }

             $brand = Brand::where('slug', $slug)->active()->firstOrFail();

             // Add item to cache
             Cache::put($cacheKey, $brand, env('CACHE_ITEM_URL', 60));
             return $brand;
         });

        Route::bind('manufacturer', function($slug, $route){
            // Generate unique cache key for value
            $cacheKey = 'manufacturerURI_'.MD5($slug);

            // Get cached item
            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }

            $manufacturer = Manufacturer::where('slug', $slug)->active()->firstOrFail();

            // Add item to cache
            Cache::put($cacheKey, $manufacturer, env('CACHE_ITEM_URL', 60));
            return $manufacturer;
        });

         Route::bind('product', function($product, $route){

             // We will use these keys to cache parents,
             // So when requested different product with same parent than parent will be served from cache
             // There may be an issue if someone changed product end uri and keep the parent, this will be true always
             // But its best if someone keep viewing products from same parent
             $routeParent = $route->parameters['parent'];
             $routeProduct = $route->parameters['product'];

             $cacheKey = MD5($routeParent.$routeProduct);
             // Get cached item
             if (env('CACHE_SINGLE_PRODUCT', false) && Cache::has($cacheKey)) {
                 return Cache::get($cacheKey);
             }

             // Get Single product
             $product = \Modules\Product\Entities\Product::where('slug', $product)
                 ->active()->firstOrFail();

             $status = true;

             // Check parent by requested URL is for Category
             if (!$this->itemParentAncestors(\Modules\Category\Entities\Category::class, $route->parameters['parent'], $routeParent)){
                 $status = false;
             }

             // Check parent by requested URL is for Brand
             // Only check if failed for category
             if (!$status && $this->itemParentAncestors(\Modules\Brand\Entities\Brand::class, $route->parameters['parent'], $routeParent)){

                 // Make success if parent Brand found
                 $status = true;
             }

             // Check parent by requested URL is for Manufacturer
             // Only check if failed for category
             if (!$status && $this->itemParentAncestors(\Modules\Manufacturer\Entities\Manufacturer::class, $route->parameters['parent'], $routeParent)){

                 // Make success if parent Manufacturer found
                 $status = true;
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
        $item = $model::where('slug', last($explodedPage))->active();

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
