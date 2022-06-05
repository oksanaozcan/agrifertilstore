<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
  public function test_home_route_redirect_to_admin()
  {
    $response = $this->get('/home');
    $response->assertRedirect('/admin');
  }
}
