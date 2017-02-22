<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;

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
        $products = $category->products()->active()->get();

        $page_title = $category->name;

        return view('product::list', compact('products', 'page_title', 'category'));
    }

    /**
     * @param $parent may be branch or category URI string
     * @param Product $product
     */
    function product($parent, Product $product){
        return view('product::single', compact('product'));
    }
}
