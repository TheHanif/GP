<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Modules\Category\Entities\Category;
use Cache;

class NavigationComposer
{
	
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {   
        $categories = Cache::remember('composer_categories', env('CACHE_NAVBAR_CATEGORIES', 60), function() {
            return Category::select('id','name', 'slug')->firstLevel()->active()->get();
        });

        $view->with('categories', $categories);
    }
}