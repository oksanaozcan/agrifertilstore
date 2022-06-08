<?php

namespace Tests\Browser;

use App\Models\Fertilizer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Admin\Fertilizers\CreatePage;
use Tests\Browser\Pages\Admin\Fertilizers\EditPage;
use Tests\Browser\Pages\Admin\Fertilizers\IndexPage;
use Tests\Browser\Pages\Admin\Fertilizers\ShowPage;
use Tests\QAPDuskTestCase;

class FertilizersTest extends QAPDuskTestCase
{
  use WithFaker;

  /** @test */
  public function it_asserts_that_user_can_read_all_fertilizers()
  {
    $fertilizers = Fertilizer::all();

    $this->browse(function(Browser $browser) use($fertilizers) {
      $browser->loginAs('admin@gmail.com')
        ->visit(new IndexPage)
        ->assertSeeAllFertilizers($fertilizers);
    });
  }   

  /** @test */
  public function it_asserts_that_user_can_read_a_single_fertilizer()
  {
    $fertilizer = Fertilizer::factory()->create();

    $this->browse(function(Browser $browser) use($fertilizer) {
      $browser->loginAs('admin@gmail.com')
        ->visit(new ShowPage($fertilizer->id))
        ->assertSeeDetails($fertilizer);
    });
  }   

  /** @test */
  public function it_asserts_that_user_can_create_a_new_fertilizer()
  {
    $dumpData = substr(md5(rand()),0,10);

    $this->browse(function(Browser $browser) use ($dumpData){
      $browser->loginAs('admin@gmail.com')
        ->visit(new CreatePage)              
        ->type('name', $dumpData)
        ->press('Добавить')
        ->on(new IndexPage)
        ->assertSee($dumpData);
    });
    $this->assertDatabaseHas('fertilizers', ['name' => $dumpData]);
  }   

  /** @test */
  public function it_asserts_that_user_can_edit_a_fertilizer()
  {
    $fertilizer = Fertilizer::factory()->create();
    $dumpData = substr(md5(rand()),0,10);

    $this->browse(function(Browser $browser) use ($fertilizer, $dumpData){
      $browser->loginAs('admin@gmail.com')
        ->visit(new EditPage($fertilizer->id))               
        ->type('name', $dumpData)
        ->press('Обновить')
        ->on(new ShowPage($fertilizer->id))
        ->assertSee($dumpData);
    });
    $this->assertDatabaseHas('fertilizers', ['name' => $dumpData]);
  }   

  /** @test */
  public function it_asserts_that_user_can_delete_a_fertilizer()
  {
    $fertilizer = Fertilizer::all()->first();

    $this->browse(function(Browser $browser) use($fertilizer) {
      $browser->loginAs('admin@gmail.com')
        ->visit(new IndexPage)
        ->click('#DataTables_Table_0 > tbody > tr.odd > td.d-flex > form > button')        
        ->assertPathIs('/admin/fertilizers')
        ->assertDontSee($fertilizer->name);
    });    
    $this->assertSoftDeleted('fertilizers', ['name' => $fertilizer->name]);
  }   
}
