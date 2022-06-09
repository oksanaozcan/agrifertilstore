<?php

namespace Tests\Browser\Pages\Main;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class IndexPage extends Page
{
  public function url()
  {
    return '/';
  }

  public function assert(Browser $browser)
  {
    $browser->assertPathBeginsWith($this->url());
  }

  public function elements()
  {
    return [
      '@element' => '#selector',
    ];
  }

  public function assertSeeFilterResult(Browser $browser, $cultures)
  {
    foreach ($cultures as $culture) {
      $browser->assertSeeIn('.culture-title', $culture->name);
    }
  }
}
