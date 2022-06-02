<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
 
  protected function schedule(Schedule $schedule)
  {
    Log::info("cron started");
    $schedule->command('queue:work')->everyMinute()->withoutOverlapping();
  }

  protected function commands()
  {
      $this->load(__DIR__.'/Commands');

      require base_path('routes/console.php');
  }
}
