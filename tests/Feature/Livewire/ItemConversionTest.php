<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ItemConversion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ItemConversionTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ItemConversion::class);

        $component->assertStatus(200);
    }
}
