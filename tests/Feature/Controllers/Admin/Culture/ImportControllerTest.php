<?php

namespace Tests\Feature\Controllers\Admin\Culture;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class ImportControllerTest extends TestCase
{
  public function test_the_application_redirected()
  {
    $response = $this->post('/admin/cultures/file-import');
    $response->assertStatus(302);
  }
}
