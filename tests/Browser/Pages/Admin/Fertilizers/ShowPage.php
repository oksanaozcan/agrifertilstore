<?php

namespace Tests\Browser\Pages\Admin\Fertilizers;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class ShowPage extends Page
{
    protected $id;

    public function __construct($id)
    {
      $this->id = $id;      
    }

    public function url()
    {
        return '/admin/fertilizers/'.$this->id;
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

    public function assertSeeDetails (Browser $browser, $fertilizer)
    {
      $browser->assertSee($fertilizer->name);
    }

    public function pressEditButton(Browser $browser, $id)
    {
      $browser->click('@editButtonFromSingleFertilizer'.$id);      
    }

    public function pressDeleteButton(Browser $browser, $id)
    {
      $browser->click('@deleteButtonFromSingleFertilizer'.$id);      
    }
}
