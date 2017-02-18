@extends('frontend.layout.app')

@section('title', $page_title)

@section('contens')
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-3 product-wrapper">
                    {{--.product-image>(a[href="#"]>img*2)+.actions>(ul.add-to-links.clearfix>li*3>a[href="#"]>i.fa.fa-star)+.action-add-cart>a[href="#"]>i.fa.fa-shopping-cart --}}
                    <div class="product-image">
                        <a href="#">
                            <img src="" alt="">
                            <img src="" alt="">
                        </a>
                        <div class="actions">
                            <ul class="add-to-links clearfix">
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                            <div class="action-add-cart"><a href="#"><i class="fa fa-shopping-cart"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>{{-- / .row --}}

        </div>
    </div>{{-- / Layout .row--}}
@endsection


@push('scripts')

@endpush
