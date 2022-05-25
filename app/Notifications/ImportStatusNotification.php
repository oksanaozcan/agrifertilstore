<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ImportStatusNotification extends Notification
{
    use Queueable;

    public $importStatus;
    
    public function __construct($importStatus)
    {
      $this->importStatus = $importStatus;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
          'id' => $this->importStatus->id,
          'path' => $this->importStatus->path,
          'status' => $this->importStatus->status,
        ];
    }
}
