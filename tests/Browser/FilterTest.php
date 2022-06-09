<?php

namespace Tests\Browser;

use App\Models\Fertilizer;
use App\Models\Culture;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\Browser\Components\FilterTestComponent;
use Tests\Browser\Pages\Main\IndexPage;
use Tests\QAPDuskTestCase;

class FilterTest extends QAPDuskTestCase
{
  use WithFaker;
  protected $name;
  protected $fertilizer_id;

   /** @test */
  public function it_assert_that_guest_can_filter_all_cultures_within_a_fertilizer_id()
  {
    $randomFertilizerId = rand(1,2);
    // $example = $this->cities->random()->id;
    $cultures = Fertilizer::find($randomFertilizerId)->cultures();    
    //where('city_id, $example)

    $this->browse(function (Browser $browser) use($randomFertilizerId, $cultures) {
      $browser->visit('/')
        ->within(new FilterTestComponent, function (Browser $browser) use ($randomFertilizerId, $cultures) {
          $browser->filterForNameAndFertilizerId('', $randomFertilizerId)
            ->pause(1000)            
            ->on(new IndexPage)
            ->assertSeeFilterResult($cultures);
        });                
    });
  }

  /** @test */
  public function it_assert_that_guest_can_filter_all_cultures_within_a_specific_culture()
  {
    $culture = Culture::factory()->create();

    $this->browse(function (Browser $browser) use($culture) {
      $browser->visit('/')
        ->within(new FilterTestComponent, function (Browser $browser) use ($culture) {
          $browser->type('@name', $culture->name)
            ->click('@submit')
            ->on(new IndexPage);
        });      

        $browser->assertSeeIn('.culture-title', $culture->name);
    });
  }
}
