@extends('frontend.layouts.app')

@section('title', 'Checkout')

@section('content')
    <h1>Checkout</h1>
    <example></example>
    <div class="well well-sm">Returning customer? Click here to login</div>
    <div class="well well-sm">Have a coupon? Click here to enter your code</div>

    {{ Form::open() }}

        <user-details :user="userDetails"></user-details>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <h2>Additional Information</h2>
                <div class="form-group">
                    {{ Form::label('additional_information', 'Order Notes', ['class'=>'label-control']) }}
                    {{ Form::textarea('additional_information', null, ['class'=>'form-control', 'placeholder'=>'Notes about your order, e.g. special notes for delivery', 'rows'=>5]) }}
                </div>
            </div>
        </div> {{-- / Additional Information --}}

        <div class="panel panel-default order_details">
            <div class="panel-heading">
                <h3 class="panel-title">Your order</h3>
            </div>

            <table class="table">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <tr v-for="item in cart">
                    <td>@{{ item.name }}</td>
                    <td>@{{ item.price }}</td>
                    <td>@{{ item.quantity }}</td>
                    <td>@{{ item.quantity*item.price }}</td>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th>SUBTOTAL</th>
                    <th>PKR @{{ cartAmount }}</th>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th>TOTAL</th>
                    <th>PKR @{{ cartAmount }}</th>
                </tr>
            </table>

        </div>{{-- / Order details --}}

        <div class="well well-sm clearfix">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::radio('payment_method', 'Bank', false, ['id'=>'bank']) }}
                        {{ Form::label('bank', 'Direct bank transfer', ['class'=>'label-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::radio('payment_method', 'cod', false, ['id'=>'cod']) }}
                        {{ Form::label('cod', 'Cash on delivery', ['class'=>'label-control']) }}
                    </div>
                </div>
            </div>
            <hr>
            {{ Form::submit('Place order', ['class'=>'btn btn-theme square-borders pull-right']) }}
        </div>
    {{ Form::close() }}

@stop
