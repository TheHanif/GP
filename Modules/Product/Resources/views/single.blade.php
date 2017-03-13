@extends('frontend.layout.app')

@section('title', $product->meta('title') ?: $product->name)

@section('content')

    <div class="row">
        <div class="col-md-9">

            <div class="row product-detail">
            	<div class="col-md-5">
					<div id="owl-productImages">
						@foreach($product->images as $image)
							<div class="item">
								{{Html::image($image->path.$image->name, null, ['class'=>'img-responsive'])}}
							</div>
						@endforeach
					</div> {{-- / #owl-productImages --}}
				</div>
            	<div class="col-md-7">
					<h1 class="product-name">{{ $product->name }}</h1>
					<div class="ratings">
						<ul>
							<li class="active"><i class="fa fa-star"></i></li>
							<li class="active"><i class="fa fa-star"></i></li>
							<li class="active"><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
						</ul>
						<span class="reviews">( 2 Customer {{ str_plural('review', 2) }} )</span>
					</div>{{-- / .ratings --}}

					<div class="price-box">PKR {{$product->sale_price}}</div>

					<p class="description">{{ $product->description }}</p>

					{!! Form::open(['route'=>'cart.add', 'class'=>'form-horizontal', 'id'=>'AddToCart']) !!}
						{!! Form::text('quantity', 1, ['class'=>'form-quantity']) !!}
						{!! Form::hidden('product_id', $product->id) !!}
						{!! Form::submit('ADD TO CART', ['class'=>'btn btn-theme btn-default square-borders']) !!}
					{!! Form::close() !!}

					<hr>
					<p><strong>SKU:</strong> <span>{{ $product->sku }}</span></p>
					<p><strong>Categories:</strong>
						@foreach($product->categories as $category)
							<a href="{{ $category->route }}">{{ $category->name }}</a>@if(!$loop->last), @endif
						@endforeach
					</p>
					<hr>

				</div>
            </div>{{-- / .product-detail --}}

			<div class="well well-sm square-borders product-disclaimer">
				<small>*We try to make sure that all product pictures, prices and pack sizes are accurate. However, these specifications are subject to change without prior notice. Actual product packaging and prices will be as per the latest policy of brand/respective company.</small>
			</div>

            <div class="product-tabs">
            	<div role="tabpanel">
            		<!-- Nav tabs -->
            		<ul class="nav nav-tabs" role="tablist">
            			<li role="presentation" class="active">
            				<a href="#Description" class="square-borders" aria-controls="Description" role="tab" data-toggle="tab">Description</a>
            			</li>
            			<li role="presentation">
            				<a href="#Reviews" class="square-borders" aria-controls="Reviews" role="tab" data-toggle="tab">Reviews</a>
            			</li>
            		</ul>
            	
            		<!-- Tab panes -->
            		<div class="tab-content">
            			<div role="tabpanel" class="tab-pane active" id="Description">
							{!! $product->long_description ?: 'No description' !!}
						</div>
            			<div role="tabpanel" class="tab-pane" id="Reviews">Reviews</div>
            		</div>
            	</div>
            </div>{{-- / .product-tabs --}}

            @include('product::widgets.related', ['product'=>$product, 'parent'=>$parent])

        </div>{{-- / Detail --}}

        <div class="col-md-3">
			@include('product::partials.sidebar')
        </div>{{-- / Sidebar  --}}

    </div>{{-- / Layout .row--}}
@endsection

@push('pagemeta')

	<meta name="description" content="{{ $product->meta_description }}">
	<link rel="canonical" href="{{$product->route}}" />

@endpush


@push('styles')
@endpush


@push('scripts')
	<script>
        $("#owl-productImages").owlCarousel({
            autoPlay: 3000,
            navigation : true,
            items: 1,
        }); // end of #owl-brands
	</script>
@endpush


