<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PurchaseForm extends Component
{
    public $open = false;
    public $crystal;

    public function toggle()
    {
        $this->open = !$this->open;
    }

    public function render()
    {
        return view('livewire.purchase-form');
    }
}
