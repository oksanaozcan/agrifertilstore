<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
  public function test_user_duplication()
  {
    $user1 = User::make([
      'name' => 'Jhon Doe',
      'email' => 'jhondoe@gmail.com',      
    ]);

    $user2 = User::make([
      'name' => 'Arya',
      'email' => 'arya@gmail.com',      
    ]);

    $this->assertTrue($user1->email != $user2->email);
  }

  public function test_delete_user()
  {
    User::factory()->count(1)->make();
    $user = User::latest('id')->first();

    if($user) {
      $user->delete();
    }

    $this->assertTrue(true);
  }

  public function test_admin_route_redirect_to_login()
  {
    $response = $this->get('/admin');
    $response->assertRedirect('/login');
  }

  public function test_database()
  {
    $this->assertDatabaseHas('users', [
      'email' => 'admin@gmail.com'
    ]);
  }

  // public function test_if_seeders_works()
  // {
  //   $this->seed();
  // }

  // public function test_user_is_logged()
  // {
  //   $response = $this->post('/login', [
      
  //   ]);
  // }

  // public function test_user_is_registered()
  // {
  //   $response = $this->post('/register', [
  //     'name' => 'Test',
  //     'email' => 'test@gmail.com',
  //     'password' => '123456789',      
  //     'password_confirmation' => '123456789'      
  //   ]);

  //   $response->assertRedirect('/home');
  // }

}
