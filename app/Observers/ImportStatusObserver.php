<?php

namespace App\Observers;

use App\Models\ImportStatus;
use Illuminate\Support\Facades\Log;

class ImportStatusObserver
{
    
  public function created(ImportStatus $importStatus)
  {
    Log::info('created', [$importStatus->status, $importStatus->id]);
  }

  public function updated(ImportStatus $importStatus)
  {
    Log::info('updated', [$importStatus->status, $importStatus->id]);
  }
}
