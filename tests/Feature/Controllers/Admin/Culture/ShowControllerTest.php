<?php

namespace Tests\Feature\Controllers\Admin\Culture;

use App\Models\Culture;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowControllerTest extends TestCase
{ 
  public function test_culture_page_existing_culture_found()
  {   
    // $culture = Culture::factory()->create();

    // $response = $this->get('/admin/cultures/'.$culture->id);

    // $response->assertStatus(200);
  }
}
