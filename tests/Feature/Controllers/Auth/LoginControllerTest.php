<?php

namespace Tests\Feature\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
  public function test_login_form()
  {
    $response = $this->get('/login');
    $response->assertStatus(200);
  }

}
