@extends('frontend.layout.app')

@section('title', $product->meta('title') ? $product->meta('title') : $product->name)

@section('contens')
    <div class="row">
        <div class="col-md-12">

            <h1>{{$product->route}}</h1>

        </div>
    </div>{{-- / Layout .row--}}
@endsection

@push('pagemeta')

	@if($product->meta('description'))
		<meta name="description" content="{{$product->meta('description')}}">
	@endif
	<link rel="canonical" href="{{$product->route}}" />

@endpush


@push('styles')

@endpush


@push('scripts')

@endpush


