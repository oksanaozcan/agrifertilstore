<?php

namespace Tests\Browser;

use App\Models\Fertilizer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\QAPDuskTestCase;

class FertilizersTest extends QAPDuskTestCase
{
  /** @test */
  public function it_asserts_that_user_can_read_all_fertilizers()
  {
    $fertilizers = Fertilizer::factory(3)->create();

    $this->browse(function(Browser $browser) use($fertilizers) {
      $browser->loginAs('admin@gmail.com')
        ->visit('/admin/fertilizers')
        ->assertSee($fertilizers->random()->name);
    });
  }   

  /** @test */
  public function it_asserts_that_user_can_read_a_single_fertilizer()
  {
    $fertilizer = Fertilizer::factory()->create();

    $this->browse(function(Browser $browser) use($fertilizer) {
      $browser->loginAs('admin@gmail.com')
        ->visit('/admin/fertilizers/'.$fertilizer->id)
        ->assertSee($fertilizer->name);
    });
  }   

  /** @test */
  public function it_asserts_that_user_can_create_a_new_fertilizer()
  {
    $dumpData = substr(md5(rand()),0,10);

    $this->browse(function(Browser $browser) use ($dumpData){
      $browser->loginAs('admin@gmail.com')
        ->visit('/admin/fertilizers')
        ->clickLink('Добавить вид')
        ->assertSee('Форма для добавления вида')
        ->assertPathIs('/admin/fertilizers/create')
        ->type('name', $dumpData)
        ->press('Добавить')
        ->assertPathIs('/admin/fertilizers')
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
        ->visit('/admin/fertilizers/'.$fertilizer->id)
        ->clickLink('Изменить')
        ->assertSee('Форма для редактирования '.$fertilizer->name)
        ->assertPathIs('/admin/fertilizers/'.$fertilizer->id.'/edit')
        ->type('name', $dumpData)
        ->press('Обновить')
        ->assertPathIs('/admin/fertilizers/'.$fertilizer->id)
        ->assertSee($dumpData);
    });
    $this->assertDatabaseHas('fertilizers', ['name' => $dumpData]);
  }   

  /** @test */
  public function it_asserts_that_user_can_delete_a_fertilizer()
  {
    $fertilizer = Fertilizer::find(1);

    $this->browse(function(Browser $browser) use($fertilizer) {
      $browser->loginAs('admin@gmail.com')
        ->visit('/admin/fertilizers')
        ->click('#DataTables_Table_0 > tbody > tr.odd > td.d-flex > form > button')        
        ->assertPathIs('/admin/fertilizers')
        ->assertDontSee($fertilizer->name);
    });    
    $this->assertSoftDeleted('fertilizers', ['name' => $fertilizer->name]);
  }   
}
