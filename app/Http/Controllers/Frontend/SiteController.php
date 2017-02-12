<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\Category\Entities\Category;

class SiteController extends Controller
{	
	/**
	 * Home page
	 */
    public function index()
    {
    	return view('frontend.home');
    }

    /**
     * Category page
     * @param  Category $category [description]
     */
    public function category(Category $category)
    {
        echo 'Category products here';

    	dd($category);
    }
}
