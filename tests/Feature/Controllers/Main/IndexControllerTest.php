<?php

namespace Tests\Feature\Controllers\Main;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Culture;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
  public function test_the_application_returns_a_successful_response()
  {
    $response = $this->get('/');
    $response->assertStatus(200);
  }

  public function test_the_application_returns_view()
  {
    $response = $this->get('/');
    $response->assertViewIs('main.index');
  }

  public function test_the_application_returns_with_data()
  {
    $data = [
      'cultures',
      'regions', 
      'tags', 
      'fertilizers'
    ];
    $response = $this->get('/');
    $response ->assertViewHasAll($data);     
  }  

  public function test_status_404_exception()
  {
    $this->get('/h')->assertStatus(404);
  }
  
}
