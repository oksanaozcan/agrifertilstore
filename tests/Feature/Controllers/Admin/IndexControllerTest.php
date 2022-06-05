<?php

namespace Tests\Feature\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;
use Illuminate\Support\Str;

class IndexControllerTest extends TestCase
{
  use RefreshDatabase;

  public function test_admin_route_auth_work()
  {
    $user = User::factory()->create([
      'name' => 'test',
      'email' => 'test@gmail.com',
      'email_verified_at' => now(),
      'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
      'remember_token' => Str::random(10),
    ]);

    $response = $this->actingAs($user)->get('/admin');
    $response->assertOk();  
  }

  public function test_auth_middleware_is_working()
  {
    $response = $this->get('/admin');
    $response->assertRedirect('/login');

    $response = $this->get('/admin/cultures');
    $response->assertRedirect('/login');
  }
}
