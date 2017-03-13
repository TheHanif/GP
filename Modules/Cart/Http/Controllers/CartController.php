<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Product\Entities\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('cart::index');
    }

    /**
     * Add to cart
     * @param Request $request
     */
    public function add(Request $request){

        $product = Product::findOrFail($request->product_id);
        $thumbnail = $product->thumbnails->first();

        $item = [
            'name' => $product->name,
            'quantity' => $request->quantity,
            'price' => $product->sale_price,
            'route' => $product->route,
            'thumbnail' => url($thumbnail->path.$thumbnail->name)
        ];

        $cart = Session::get('cart');
        $cart[] = $item;
        Session::put('cart', $cart);

        return response($item, 201);
    }

    /**
     * Get cart items for widget
     */
    public function widget(){
//        Session::forget('cart');
//        Session::flush();
        return response(Session::get('cart') ?: [], 200);
    }
}
