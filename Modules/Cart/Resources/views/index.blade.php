@extends('frontend.layouts.app')

@section('title', 'Cart')

@section('content')
    <h1>Cart</h1>

    <table class="table table-bordered" v-if="cart.length > 0">
        <tr>
            <th colspan="3">PRODUCT</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
            <th>TOTAL</th>
        </tr>

        <tr v-for="(item, key) in cart">
            <td align="center" valign="center"><a href="#" @click.prevent="DeleteCartItem(key, item.id)" title="Remove this item from cart"><i class="fa fa-close"></i></a></td>
            <td><img :src="item.thumbnail" :alt="item.name" class="img-responsive" style="max-height: 50px" /></td>
            <td><a :href="item.route">@{{ item.name }}</a></td>
            <td>PKR @{{ item.price }}</td>
            <td>{!! Form::number('quantity', null,
                ['class'=>'form-quantity form-control square-borders pull-left',
                'v-model'=>'item.quantity',
                'min'=>1,
                '@change'=>'UpdateQuantity(key, item.id, item.quantity)']) !!}</td>
            <td>PKR @{{ item.price * item.quantity }}</td>
        </tr>
    </table>

    <div class="row" v-if="cart.length > 0">
        <div class="col-md-4 col-md-offset-8">
            <h4>CART TOTALS</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Subtotal</th>
                    <td>PKR @{{ cartAmount }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>PKR @{{ cartAmount }}</td>
                </tr>
            </table>
            <a href="{{ route('cart.checkout') }}" class="btn btn-theme square-borders">PROCESS TO CHECKOUT</a>
        </div>
    </div>

    <div v-else class="alert alert-info">Your cart is empty</div>
@stop
