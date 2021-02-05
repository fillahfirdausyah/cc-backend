<?php

namespace App\View\Components;

use Illuminate\View\Component;

class kartu-iuran.blade.php extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.kartu-iuran.blade.php');
    }
}
