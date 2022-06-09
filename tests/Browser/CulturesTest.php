<?php

namespace Tests\Browser;

use App\Models\Tag;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Admin\Cultures\CreatePage;
use Tests\Browser\Pages\Admin\Cultures\IndexPage;
use Tests\QAPDuskTestCase;

class CulturesTest extends QAPDuskTestCase
{
  use WithFaker; 

  protected function getFakeCultureData()
  {
    $faker = $this->faker;

    $name = $faker->word;
    $nitrogen = $faker->numberBetween(1, 3);
    $phosphorus = $faker->numberBetween(1, 3);
    $potassium = $faker->numberBetween(1, 3);
    $fertilizer_id = $faker->numberBetween(1, 2);
    $region = $faker->country;
    $price = $faker->numberBetween(100, 600);
    $description = $faker->paragraph;
    $purpose = $faker->paragraph;
    $tags = Tag::all()->random(3);

    return compact('name', 'nitrogen', 'phosphorus', 'potassium', 'fertilizer_id', 'region', 'price', 'description', 'purpose', 'tags');
  }

  /** @test */
  public function it_asserts_that_user_can_create_a_new_culture()
  {
    $fakeCultureData = $this->getFakeCultureData();

    $this->browse(function(Browser $browser) use ($fakeCultureData) {
      $browser->loginAs('admin@gmail.com')
        ->visit(new CreatePage)
        ->assertSee('Форма для добавления культуры')
        ->fillFormDataAndSubmit($fakeCultureData);    
    });
    $this->assertDatabaseHas('cultures', ['name' => $fakeCultureData['name']]);
  }
}
