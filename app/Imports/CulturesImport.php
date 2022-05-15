<?php

namespace App\Imports;

use App\Models\Culture;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class CulturesImport implements 
ToModel, 
WithHeadingRow, 
WithBatchInserts,
WithChunkReading,
WithValidation,
ShouldQueue

{
  use Importable;

  public function rules(): array
  {
    return [
      'name' => 'unique:cultures,name',
      'nitrogen' => 'required|numeric',
      'phosphorus' => 'required|numeric',
      'potassium' => 'required|numeric',
      'fertilizer_id' => 'required|integer|exists:fertilizers,id',         
      'region' => 'required|string',
      'price' => 'required|numeric',
      'description' => 'required|string',
      'purpose' => 'required|string',
    ];
  }
    
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

  public function batchSize(): int
  {
      return 1000;
  }

  public function chunkSize(): int
  {
      return 1000;
  }

    
}
