<div class="widget widget_brand">

    <h3 class="widget_title"><span>Brands</span></h3>

    <div id="owl-brands" class="owl-carousel">

        @foreach($brands as $brand)

            <div class="item">
                <a href="{{$brand->route}}">
                    {{ Html::image($brand->logo, $brand->name, ['class'=>'img-responsive']) }}
                </a>
            </div>

        @endforeach

    </div>

</div>