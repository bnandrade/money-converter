<?php

namespace App\Http\Livewire;

use App\Models\Conversion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyConversions extends Component
{
    public function render()
    {
        $user_id = Auth::id();
        $my_conversions = Conversion::where('user_id', $user_id)->orderBy('id', 'DESC')->get();

        return view('livewire.my-conversions',[
            'user_id' => $user_id,
            'my_conversions' => $my_conversions
        ]);
    }
}
