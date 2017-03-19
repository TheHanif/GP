<?php
/**
 * @param $product Eloquent Product
 * @param $parent Eloquent Category/Brand/Manufacturer ->url attribute
 */

// Create product URL for current parent
$url = URL('/'.$parent->AncestorsList.'/'.$product->slug);
?>
<div class="product-wrapper">
    <div class="product-image">
        <a href="{{$url}}">
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
            <div class="action-add-cart"><a href="#" @click.prevent="AddToCartDirect({{ $product->id }})"><i class="fa fa-shopping-cart"></i> Add to cart</a></div>
        </div>
    </div>
    <h2 class="product-name"><a href="{{$url}}">{{ $product->name }}</a></h2>
    <div class="ratings">
        <ul>
            <li class="active"><i class="fa fa-star"></i></li>
            <li class="active"><i class="fa fa-star"></i></li>
            <li class="active"><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
        </ul>
    </div>
    <div class="price-box">{{$product->sale_price}}</div>
</div>{{-- / .product-inner-wrapper --}}