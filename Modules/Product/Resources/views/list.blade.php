@extends('frontend.layout.app')

@section('title', $parent->name)

@section('contens')
    <div class="row">
        <div class="col-md-12">

            @if($products->count() <= 0)
                Products not available.
            @else

                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3 col-sm-6">
                            {{--.product-image>(a[href="#"]>img*2)+.actions>(ul.add-to-links.clearfix>li*3>a[href="#"]>i.fa.fa-star)+.action-add-cart>a[href="#"]>i.fa.fa-shopping-cart --}}
                            @include('product::partials.product', ['$product'=>$product, 'parent'=>$parent])
                        </div>
                    @endforeach
                </div>{{-- / .row --}}

            @endif

        </div>
    </div>{{-- / Layout .row--}}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{mix('css/product_list.css')}}">
@endpush

@push('scripts')

@endpush


