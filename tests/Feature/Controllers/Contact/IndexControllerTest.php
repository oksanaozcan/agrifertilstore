<?php

namespace Tests\Feature\Controllers\Contact;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
  public function test_the_application_returns_a_successful_response()
  {
    $response = $this->get('/contacts');
    $response->assertStatus(200);
  }

  public function test_the_application_returns_view()
  {
    $response = $this->get('/contacts');
    $response->assertViewIs('contacts.index');
  }

  public function test_a_index_view_can_be_rendered()
  {
    $view = $this->view('contacts.index');
    $view->assertSee('Для заказа удобрений:');
  }
}
