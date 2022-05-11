<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Converter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ConverterTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Converter::class);

        $component->assertStatus(200);
    }
}
