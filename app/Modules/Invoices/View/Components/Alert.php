<?php

namespace App\Modules\Invoices\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(
        private string $type,
        private ?string $dismissible = null
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
