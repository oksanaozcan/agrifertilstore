<?php

namespace Tests\Browser\Pages\Admin\Cultures;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class CreatePage extends Page
{
    public function url()
    {
        return '/admin/cultures/create';
    }

    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    public function elements()
    {
        return [
          '@element' => '#selector',
        ];
    }

    public function fillFormDataAndSubmit(Browser $browser, $fakeCultureData)
    {    
      $browser
        ->pause(700)
        ->type('name', $fakeCultureData['name'])        
        ->type('nitrogen', $fakeCultureData['nitrogen'])       
        ->type('phosphorus', $fakeCultureData['phosphorus'])        
        ->type('potassium', $fakeCultureData['potassium'])      
        ->select('fertilizer_id')       
        ->type('region', $fakeCultureData['region'])       
        ->type('price', $fakeCultureData['price'])       
        ->type('description', $fakeCultureData['description'])     
        ->type('purpose', $fakeCultureData['purpose'])       
        ->select('tags[]')       
        ->press('Добавить')
        ->pause(500);        
    }
}
