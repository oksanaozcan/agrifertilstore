<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    public function testLogin()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/login')
          ->type('email', 'admin@gmail.com')
          ->type('password', '123456789')
          ->press('Login')
          ->assertPathIs('/admin');       
      });
    }    
}
