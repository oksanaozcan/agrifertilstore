<?php

namespace Tests\Browser\Pages\Admin\Fertilizers;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class CreatePage extends Page
{
    public function url()
    {
      return '/admin/fertilizers/create';
    }

    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
          ->assertSee('Форма для добавления вида') ;
    }
  
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }

    public function fillAndSubmitForm(Browser $browser, $data)
    {
      $browser->type('name', $data)
        ->press('Добавить');
    }
}
