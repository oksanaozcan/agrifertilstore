<?php

namespace Tests\Browser\Pages\Admin\Fertilizers;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class EditPage extends Page
{
  protected $id;

  public function __construct($id)
  {
    $this->id = $id;      
  }

    public function url()
    {
        return '/admin/fertilizers/'.$this->id.'/edit';
    }
   
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
        ->assertSee('Форма для редактирования');
    }
    
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
