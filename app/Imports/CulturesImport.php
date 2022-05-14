<?php

namespace App\Imports;

use App\Models\Culture;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Throwable;

class CulturesImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{
  use Importable;
    
    public function model(array $row)
    {
      return new Culture([
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

    public function chunkSize(): int
    {
        return 1000;
    }
}
