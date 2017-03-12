@if($product->related->count())
    <div class="widget widget_brand">

        <h3 class="widget_title"><span>Related products</span></h3>

        <div id="owl-related" class="owl-carousel">

            @foreach($product->related as $related)
                <div class="item">
                    @include('product::partials.product', ['product'=>$related, 'parent'=>$parent])
                </div>
            @endforeach

        </div>

    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                /**
                 * Setup Owl carousel
                 */
                $("#owl-related").owlCarousel({
                    autoPlay: 3000,
                    navigation : true,
                    items: 4,
                    itemsDesktop: [1199, 4],
                    itemsDesktopSmall: [1024, 3],
                    itemsTablet: [768,2],
                    itemsMobile: [479,1],
                }); // end of Owl carousel

            }); // end of ready statement
        </script>
    @endpush

@endif