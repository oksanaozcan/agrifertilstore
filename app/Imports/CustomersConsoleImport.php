<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersConsoleImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
      foreach ($collection as $row) 
      {
        if ($row->filter()->isNotEmpty())
        {          
          Customer::firstOrCreate([
            'name' => $row['name'],
            'contract_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['contract_date']),
            'cost' => $row['cost'],
            'region' => $row['region']
          ]);
        }
      }
    }
}