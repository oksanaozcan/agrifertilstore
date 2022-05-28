<?php

namespace App\Imports;

use App\Models\Culture;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CulturesConsoleImport implements ToCollection, WithHeadingRow
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
          Culture::firstOrCreate([
          'name' => $row['name']
          ], [
            'name' => $row['name'],
            'nitrogen' => $row['nitrogen'],
            'phosphorus' => $row['phosphorus'],
            'potassium' => $row['potassium'],
            'fertilizer_id' => $row['fertilizer_id'],           
            'region' => $row['region'],
            'price' => $row['price'],
            'description' => $row['description'],
            'purpose' => $row['purpose']
          ]);
        }
      }
    }
}