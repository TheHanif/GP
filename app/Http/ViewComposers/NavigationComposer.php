<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Modules\Category\Entities\Category;

class NavigationComposer
{
	protected $category;
    
    public function __construct(Category $category)
    {
    	$this->$category = $category;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('count', 122);
    }
}