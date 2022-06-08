<?php

namespace Tests\Browser\Pages\Admin\Fertilizers;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class IndexPage extends Page
{
   public function url()
    {
        return '/admin/fertilizers';
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

    public function assertSeeAllFertilizers(Browser $browser, $fertilizers)
    {
      foreach ($fertilizers as $fertilizer) {
        $browser->assertSee($fertilizer->name);
      }
    }
}
