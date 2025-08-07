<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class PageTitle extends Component
{

    public string $title;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Get name of current route
        $routeName = Route::currentRouteName();

        // Assign corresponding title
        $this->title = match ($routeName) {
            'dashboard' => 'Bookmarks',
            'dashboard.folder' => 'Folders',
            'dashboard.tag' => 'Tags',
            default => 'Dashboard',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page-title');
    }
}
