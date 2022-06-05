<?php

namespace Tests\Feature\Controllers\Contact;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreControllerTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_redirect_after_store()
  {
    $data = [
      'phone_number' => '',
      'info' => ''
    ];
    
    $response = $this->post('/contacts', $data);
    $response->assertStatus(302);
  }

  public function test_the_application_returns_view()
  {
    $response = $this->get('/contacts');
    $response->assertViewIs('contacts.index');
  }
}
