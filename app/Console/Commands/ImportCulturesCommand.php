<?php

namespace App\Console\Commands;

use App\Imports\CulturesImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportCulturesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:cultures';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data to database cultures table from xlsx file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      ini_set('memory_limit', '-1');
      Excel::import(new CulturesImport, public_path('exel/indexes.xlsx'));      

      $this->info('The command was successful!');
    }
}
