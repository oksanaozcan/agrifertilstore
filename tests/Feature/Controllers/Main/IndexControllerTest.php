<?php

namespace Tests\Feature\Controllers\Main;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Culture;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
  public function test_the_application_returns_a_successful_response()
  {
    $data = [
      'cultures',
      'regions', 
      'tags', 
      'fertilizers'
    ];

    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertViewIs('main.index');   
    $response ->assertViewHasAll($data);    
  }
  
  public function test_status_404_exception()
  {
    $this->get('/h')->assertStatus(404);
  }
  
}
