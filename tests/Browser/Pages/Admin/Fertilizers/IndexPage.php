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

    public function pressViewButton (Browser $browser, $id)
    {
      $browser->click('@viewButton'.$id);
    }

    public function pressEditButton (Browser $browser, $id)
    {
      $browser->click('@editButton'.$id);
    }

    public function pressCreateButton (Browser $browser)
    {
      $browser->click('@addFertilizerButton');
    }

    public function pressDeleteButton (Browser $browser, $id)
    {
      $browser->click('@deleteFertilizerButton'.$id);
    }
}
