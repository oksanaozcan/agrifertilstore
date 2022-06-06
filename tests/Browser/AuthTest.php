<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
  /** @test */
    public function it_asserts_that_user_can_login()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/login')
          ->assertSee('Login')
          ->type('email', 'admin@gmail.com')
          ->type('password', '123456789')
          ->press('Login')
          ->assertSee('Статистика')
          ->assertPathIs('/admin')
          ->assertAuthenticated();
        });
    } 

    /** @test */
    public function it_asserts_that_user_can_logout()
    {
      $this->browse(function (Browser $browser) {
        $browser->loginAs('admin@gmail.com')
          ->visit('/admin')
          ->assertSee('Logout')
          ->clickLink('Logout')
          ->assertGuest();         
        });
    }    

    /** @test */
    public function it_asserts_that_incorrect_login_fails()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/login')        
          ->assertSee('Login')
          ->type('email', 'admin@gmail.com')
          ->type('password', 'someincorrectpass')
          ->press('Login')
          ->assertPathIs('/login')
          ->assertSee('These credentials do not match our records.');
        });
    } 
}
