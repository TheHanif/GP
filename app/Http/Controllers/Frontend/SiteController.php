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
     * @param  Category $category
     */
    public function category(Category $category)
    {
        $products = $category->products()->with('thumbnails')->active()->get();

        $page_title = $category->name;

        return view('product::list', compact('products', 'page_title'));
    }
}
