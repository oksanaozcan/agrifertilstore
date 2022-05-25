<?php

namespace App\Imports;

use App\Models\Culture;
use App\Models\ImportStatus;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Illuminate\Support\Facades\DB;

class CulturesImport implements 
ToModel, 
WithHeadingRow, 
WithBatchInserts,
WithChunkReading,
WithValidation,
WithEvents,
ShouldQueue,
SkipsEmptyRows,
SkipsOnFailure

{
  use Importable, RegistersEventListeners, SkipsFailures;      

  public $file;
  public $userId;
  public $importStatusId;

  public function __construct($file, $userId, $importStatusId)
  {
    $this->file = $file;
    $this->userId = $userId;
    $this->importStatusId = $importStatusId;
  }

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
    ImportStatus::find($this->importStatusId)
      ->update(['status' => 'success']);

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

  public function onFailure(Failure ...$failures)
  {
    ImportStatus::find($this->importStatusId)
    ->update(['status' => 'failed']);

    $data = [];
    foreach ($failures as $failure) {
      $data[] = [
        'path' => $this->file, /////
        'module' => 'Culture', 
        'status' => 'failed',
        'user_id' => $this->userId, ////
        'attribute' => $failure->attribute(),
        'row' => $failure->row(),           
        'values' => json_encode($failure->values()),
        'errors' => json_encode($failure->errors()),
      ];
    }
    ImportStatus::insert($data);
  }

  public function batchSize(): int
  {
      return 1000;
  }

  public function chunkSize(): int
  {
      return 1000;
  }

  public static function afterImport(AfterImport $event)
  {
    
  }
}
