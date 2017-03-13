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
        dd($request->all());
        return 'Added to cart';
    }
}
