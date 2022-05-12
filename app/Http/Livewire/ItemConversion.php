<?php

namespace App\Http\Livewire;

use App\Models\Conversion;
use Livewire\Component;

class ItemConversion extends Component
{
    public Conversion $conversion;

    public function render()
    {
        return view('livewire.item-conversion');
    }
}
