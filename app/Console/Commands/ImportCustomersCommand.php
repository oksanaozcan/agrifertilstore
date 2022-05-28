<?php

namespace App\Console\Commands;

use App\Imports\CustomersConsoleImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportCustomersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data to database customers table from xlsx file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      ini_set('memory_limit', '-1');
      Excel::import(new CustomersConsoleImport, public_path('exel/customers.xlsx'));      

      $this->info('The command was successful!');
    }
}
