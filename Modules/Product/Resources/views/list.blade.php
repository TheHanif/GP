@extends('frontend.layout.app')

@section('title', $page_title)

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
                            <div class="product-wrapper">
                                <div class="product-image">
                                    <a href="#">
                                        @foreach($product->thumbnails as $thumbnail)
                                            {{Html::image($thumbnail->path.$thumbnail->name)}}
                                        @endforeach
                                    </a>
                                    <div class="actions">
                                        <ul class="add-to-links clearfix">
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-toggle-on"></i></a></li>
                                            <li><a href="#"><i class="fa fa-search"></i></a></li>
                                        </ul>
                                        <div class="action-add-cart"><a href="#"><i class="fa fa-shopping-cart"></i> Add to cart</a></div>
                                    </div>
                                </div>
                                <h2 class="product-name"><a href="#">{{ $product->name }}</a></h2>
                                <div class="ratings">
                                    <ul>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="price-box">$200.00</div>
                            </div>{{-- / .product-inner-wrapper --}}
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


