<?php

namespace App\Imports;

use App\Models\Culture;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CulturesImport implements ToCollection, WithHeadingRow, WithChunkReading, ShouldQueue
{
  use Importable;
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

    public function chunkSize(): int
    {
        return 1000;
    }
}
