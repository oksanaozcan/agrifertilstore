<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;

class FilterTestComponent extends BaseComponent
{  
  public function selector()
  {
    return '.culture-filter';
  }
  
  public function assert(Browser $browser)
  {
    $browser->assertVisible($this->selector());
  }

  public function elements()
  {
    return [
      '@name' => 'input[name="name"]',
      '@n_from' => 'input[name="n_from"]',
      '@n_to' => 'input[name="n_to"]',
      '@p_from' => 'input[name="p_from"]',
      '@p_to' => 'input[name="p_to"]',
      '@k_from' => 'input[name="k_from"]',
      '@k_to' => 'input[name="k_to"]',
      '@price_from' => 'input[name="price_from"]',
      '@price_to' => 'input[name="price_to"]',
      '@fertilizer_id' => 'select[name="fertilizer_id"]',
      '@tags[]' => 'select[name="tags[]"]',
      '@regions[]' => 'select[name="regions[]"]',
      '@purpose' => 'input[name="purpose"]',
      '@description' => 'textarea[name="description"]',
      '@order_price' => 'select[name="order_price"]',
      '@order_name' => 'select[name="order_name"]',
      '@submit' => 'button[type="submit"]',
    ];
  }

  public function filterForNameAndFertilizerId (Browser $browser, $name, $fertilizer_id)
  {
    $browser->type('@name', $name)
      ->select('@fertilizer_id', $fertilizer_id)
      ->click('@submit');
  }
}
