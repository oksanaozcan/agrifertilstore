<?php

namespace App\Observers;

use App\Models\Fertilizer;
use Illuminate\Support\Facades\Cache;

class FertilizerObserver
{
    /**
     * Handle the Fertilizer "created" event.
     *
     * @param  \App\Models\Fertilizer  $fertilizer
     * @return void
     */
    public function created(Fertilizer $fertilizer)
    {
      $this->clearCache();
    }

    /**
     * Handle the Fertilizer "updated" event.
     *
     * @param  \App\Models\Fertilizer  $fertilizer
     * @return void
     */
    public function updated(Fertilizer $fertilizer)
    {
      $this->clearCache();
    }

    /**
     * Handle the Fertilizer "deleted" event.
     *
     * @param  \App\Models\Fertilizer  $fertilizer
     * @return void
     */
    public function deleted(Fertilizer $fertilizer)
    {
      $this->clearCache();
    }

    /**
     * Handle the Fertilizer "restored" event.
     *
     * @param  \App\Models\Fertilizer  $fertilizer
     * @return void
     */
    public function restored(Fertilizer $fertilizer)
    {
      $this->clearCache();
    }

    /**
     * Handle the Fertilizer "force deleted" event.
     *
     * @param  \App\Models\Fertilizer  $fertilizer
     * @return void
     */
    public function forceDeleted(Fertilizer $fertilizer)
    {
      $this->clearCache();
    }

    protected function clearCache() 
    {
      Cache::forget('fertilizers');
    }
}
