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
            <td><a href="#" @click.prevent="DeleteCartItem(key, item.id)" title="Remove this item from cart"><i class="fa fa-trash-o"></i></a></td>
            <td><img :src="item.thumbnail" :alt="item.name" class="img-responsive" style="max-height: 50px" /></td>
            <td><a :href="item.route">@{{ item.name }}</a></td>
            <td>PKR @{{ item.price }}</td>
            <td>{!! Form::number('quantity', 1,
                ['class'=>'form-quantity form-control square-borders pull-left',
                'v-model'=>'item.quantity',
                'min'=>1,
                '@change'=>'UpdateQuantity(key, item.id, item.quantity)']) !!}</td>
            <td>PKR @{{ item.price * item.quantity }}</td>
        </tr>
    </table>

    <div v-else class="alert alert-info">Your cart is empty</div>
@stop
