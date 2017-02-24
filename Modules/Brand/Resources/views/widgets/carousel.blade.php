<div class="widget widget_brand">
    <h3 class="widget_title"><span>Brands</span></h3>

    <ul>
        @foreach($brands as $brand)
            <li><a href="{{$brand->route}}">{{$brand->name}}</a></li>
        @endforeach
    </ul>
</div>