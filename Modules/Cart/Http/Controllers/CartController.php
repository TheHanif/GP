<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

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
        return response( ['id'=>$request->product_id, 'name'=>'testing 1', 'quantity'=>$request->quantity, 'price'=>100, 'thumbnail'=>'http://grocery.local/uploads/dummy/50.png', 'route'=>'#'], 201);
        return 'Added to cart';
    }

    public function widget(){
        $data = [
            ['id'=>1, 'name'=>'testing 1', 'quantity'=>1, 'price'=>100, 'thumbnail'=>'http://grocery.local/uploads/dummy/50.png', 'route'=>'#'],
            ['id'=>2, 'name'=>'testing 2', 'quantity'=>5, 'price'=>50, 'thumbnail'=>'http://grocery.local/uploads/dummy/50.png', 'route'=>'#'],
        ];

        return response($data, 200);
    }
}
