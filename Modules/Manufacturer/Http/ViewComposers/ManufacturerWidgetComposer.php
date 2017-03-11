<?php

namespace Modules\Manufacturer\Http\ViewComposers;

use Illuminate\View\View;
use Modules\Brand\Entities\Brand;
use Cache;
use Modules\Manufacturer\Entities\Manufacturer;

class ManufacturerWidgetComposer
{
	
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $manufacturers = Cache::remember('composer_manufacturer', env('CACHE_WIDGETS', 60), function() {
            return Manufacturer::active()->get();
        });

        $view->with('manufacturers', $manufacturers);
    }
}