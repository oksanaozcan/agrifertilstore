<?php

namespace App\Observers;

use App\Models\ImportStatus;
use App\Models\User;
use App\Notifications\ImportStatusNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class ImportStatusObserver
{
    
  public function created(ImportStatus $importStatus)
  {
    // Log::info('created', [$importStatus->status, $importStatus->id]);
    $users = User::all();
    Notification::send($users, new ImportStatusNotification($importStatus));
  }

  public function updated(ImportStatus $importStatus)
  {
    // Log::info('updated', [$importStatus->status, $importStatus->id]);
    $users = User::all();
    Notification::send($users, new ImportStatusNotification($importStatus));
  }
}
