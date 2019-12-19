<?php

namespace Anditsung\Manufacture;

use Anditsung\Manufacture\Nova\Plant;
use Anditsung\Manufacture\Nova\ProductType;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class Manufacture extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('manufacture', __DIR__.'/../dist/js/tool.js');
        Nova::style('manufacture', __DIR__.'/../dist/css/tool.css');

        Nova::resources([
            Plant::class,
            ProductType::class,
        ]);
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('manufacture::navigation');
    }
}
