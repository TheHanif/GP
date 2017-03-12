<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Manufacturer\Entities\Manufacturer;
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
    public function category(Category $parent)
    {
        $products = $parent->products;

        return view('product::list', compact('products', 'parent'));
    }

    /**
     * @param $parent may be branch or category URI string
     * @param Product $product
     */
    function product($parent, $item){

        $product = $item['product'];
        $parent = $item['parent'];
        return view('product::single', compact('product', 'parent'));
    }


    public function brand(Brand $parent){
        $products = $parent->products;

        return view('product::list', compact('products', 'parent'));
    }

    public function manufacturer(Manufacturer $parent){
        $products = $parent->products;

        return view('product::list', compact('products', 'parent'));
    }
}
