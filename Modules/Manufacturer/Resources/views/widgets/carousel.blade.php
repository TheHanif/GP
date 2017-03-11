<div class="widget widget_manufacturer">

    <h3 class="widget_title"><span>Manufacturers</span></h3>

    <div id="owl-manufacturer" class="owl-carousel">

        @foreach($manufacturers as $manufacturer)

            <div class="item">
                <a href="{{$manufacturer->route}}">
                    {{ Html::image($manufacturer->logo, $manufacturer->name, ['class'=>'img-responsive']) }}
                </a>
            </div>

        @endforeach

    </div>

</div>