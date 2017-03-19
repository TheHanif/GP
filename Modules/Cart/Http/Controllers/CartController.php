<?php

namespace Modules\Cart\Http\Controllers;

//use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Cart\Entities\Cart;
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
            'product_id' => $product->id,
            'name' => $product->name,
            'quantity' => $request->quantity,
            'price' => $product->sale_price,
            'route' => $product->route,
            'thumbnail' => url($thumbnail->path.$thumbnail->name),
            'id' => null
        ];

        // Save to cart table
        if (!Auth::guest()){
            $cart = new Cart();
            $cart->fill($item);

            Auth::user()->cart()->save($cart);

            $item['id'] = $cart->id;
        }else{

            // Or put it in session
            $cart = Session::get('cart');
            $cart[] = $item;
            Session::put('cart', $cart);
        }

        return response($item, 201);
    }

    /**
     * Remove item from cart
     */
    public function remove($key, $cart_id = null){

        // Delete item from cart table if user logged in
        if (!Auth::guest()){
            Auth::user()->cart()->find($cart_id)->delete();
            $cart = Auth::user()->cart()->get();
            return response($cart);
        }

        // else : Remove item from cart session

        // Get cart items
        $cart = Session::get('cart');

        // Remove item
        unset($cart[$key]);

        // Re arrange array
        $temp = [];
        foreach ($cart as $key => $item){
            $temp[] = $item;
        }

        // Put it to session
        Session::put('cart', $temp);

        // Return updated cart items
        return response($cart);
    }

    /**
     * Get cart items for widget
     */
    public function widget(){
//        Session::forget('cart');
//        Session::flush();

        $cart = $this->cart();
        return response($cart, 200);
    }

    // Get Cart list
    public function cart(){
        if (!Auth::guest()){
            $cart = Auth::user()->cart()->get();
        }else{
            $cart = Session::get('cart') ?: [];
        }

        return $cart;
    }
}
