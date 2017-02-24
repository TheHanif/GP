<?php

namespace Modules\Brand\Http\ViewComposers;

use Illuminate\View\View;
use Modules\Brand\Entities\Brand;
use Cache;

class BrandWidgetComposer
{
	
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
//        $brands = Cache::remember('composer_categories', env('CACHE_WIDGETS', 60), function() {
//            return Category::select('id','name', 'slug')->firstLevel()->active()->get();
//        });


        $view->with('brands', Brand::all());
    }
}