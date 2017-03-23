@extends('frontend.layouts.app')

@section('title', 'Checkout')

@section('content')
    <h1>Checkout</h1>

    <div class="well well-sm">Returning customer? Click here to login</div>
    <div class="well well-sm">Have a coupon? Click here to enter your code</div>

    {{ Form::open() }}
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <h2>Billing details</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[first_name]', 'First Name', ['class'=>'label-control']) }}
                            {{ Form::text('billing[first_name]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[last_name]', 'Last Name', ['class'=>'label-control']) }}
                            {{ Form::text('billing[last_name]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[email]', 'Email address', ['class'=>'label-control']) }}
                            {{ Form::email('billing[email]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[mobile]', 'Mobile no.', ['class'=>'label-control']) }}
                            {{ Form::text('billing[mobile]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('billing[address]', 'Address', ['class'=>'label-control']) }}
                            {{ Form::text('billing[address]', null, ['class'=>'form-control', 'placeholder'=>'Street address']) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::text('billing[apartment]', null, ['class'=>'form-control', 'placeholder'=> 'Apartment, suite, unit etc. (Optional)']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[city]', 'City', ['class'=>'label-control']) }}
                            {{ Form::text('billing[city]', 'Karachi', ['class'=>'form-control', 'readonly'=>'true']) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[area]', 'Area', ['class'=>'label-control']) }}
                            {{ Form::text('billing[area]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('billing[landmark]', 'Nearest Landmark', ['class'=>'label-control']) }}
                            {{ Form::text('billing[landmark]', null, ['class'=>'form-control', 'placeholder'=>'Any nearest famous place']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('different_shipping', 'yes', false, ['id'=>'different_shipping']) }}
                            {{ Form::label('different_shipping', 'Change Shipping Details', ['class'=>'label-control']) }}
                        </div>
                    </div>
                </div>
            </div> {{-- / Billing details--}}

            <div class="col-sm-6 col-md-6">
                <h2>Shipping details</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[first_name]', 'First Name', ['class'=>'label-control']) }}
                            {{ Form::text('billing[first_name]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[last_name]', 'Last Name', ['class'=>'label-control']) }}
                            {{ Form::text('billing[last_name]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[email]', 'Email address', ['class'=>'label-control']) }}
                            {{ Form::email('billing[email]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[mobile]', 'Mobile no.', ['class'=>'label-control']) }}
                            {{ Form::text('billing[mobile]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('billing[address]', 'Address', ['class'=>'label-control']) }}
                            {{ Form::text('billing[address]', null, ['class'=>'form-control', 'placeholder'=>'Street address']) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::text('billing[apartment]', null, ['class'=>'form-control', 'placeholder'=> 'Apartment, suite, unit etc. (Optional)']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[city]', 'City', ['class'=>'label-control']) }}
                            {{ Form::text('billing[city]', 'Karachi', ['class'=>'form-control', 'readonly'=>'true']) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('billing[area]', 'Area', ['class'=>'label-control']) }}
                            {{ Form::text('billing[area]', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('billing[landmark]', 'Nearest Landmark', ['class'=>'label-control']) }}
                            {{ Form::text('billing[landmark]', null, ['class'=>'form-control', 'placeholder'=>'Any nearest famous place']) }}
                        </div>
                    </div>
                </div>
            </div> {{-- / Shipping details--}}
        </div> {{-- / Customer Information form --}}

        <h2>Additional Information</h2>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    {{ Form::label('billing[landmark]', 'Order Notes', ['class'=>'label-control']) }}
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
