<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Modules\Category\Entities\Category;

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
        $categories = Category::select('id','name', 'slug')->firstLevel()->active()->get();

        $view->with('categories', $categories);
    }
}