<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Fees;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FeesTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Fees::class);

        $component->assertStatus(200);
    }
}
