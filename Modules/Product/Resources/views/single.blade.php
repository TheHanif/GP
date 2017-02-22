@extends('frontend.layout.app')

@section('title', $product->name)

@section('contens')
    <div class="row">
        <div class="col-md-12">

            <h1>{{$product->route}}</h1>

        </div>
    </div>{{-- / Layout .row--}}
@endsection

@push('styles')

@endpush

@push('scripts')

@endpush


