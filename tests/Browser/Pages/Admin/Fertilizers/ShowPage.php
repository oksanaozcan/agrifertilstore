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

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
