<?php

namespace Tests\Browser\Pages\Admin\Cultures;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class IndexPage extends Page
{
    public function url()
    {
        return '/admin/cultures';
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
}
