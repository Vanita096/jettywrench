<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (auth()->check()) {
            $view->with('organizations', auth()->user()->organizations);
        }
    }
}