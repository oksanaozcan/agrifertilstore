<?php

namespace Tests\Feature\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
  public function test_register_route_redirect_to_main()
  {
    $response = $this->get('/register');
    $response->assertRedirect('/');
  }
}
