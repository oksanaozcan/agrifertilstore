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
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

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
      'name' => 'required|unique:cultures,name',
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

  public function customValidationMessages()
  {
    return [
        'name.required' => 'Поле name не заполнено',
        'name.unique' => 'Наименование товара должно быть уникальным',
        'nitrogen.required' => 'Поле nitrogen не заполнено',
        'nitrogen.numeric' => 'Поле nitrogen должно быть числом',
        'phosphorus.required' => 'Поле phosphorus не заполнено',
        'phosphorus.numeric' => 'Поле phosphorus должно быть числом',
        'potassium.required' => 'Поле potassium не заполнено',
        'potassium.numeric' => 'Поле potassium должно быть числом',
        'fertilizer_id.required' => 'Поле fertilizer_id не заполнено',
        'fertilizer_id.integer' => 'Поле fertilizer_id должно быть целым числом',
        'region.required' => 'Поле region не заполнено',
        'region.string' => 'Поле region должно быть строкой',
        'price.required' => 'Поле price не заполнено',
        'price.numeric' => 'Поле price должно быть числом',
        'description.required' => 'Поле description не заполнено',
        'description.string' => 'Поле description должно быть строкой',
        'purpose.required' => 'Поле purpose не заполнено',
        'purpose.string' => 'Поле purpose должно быть строкой',
    ];
  }  

  public function onFailure(Failure ...$failures)
  {
    $data = [];
    foreach ($failures as $failure) {
      $data[] = [       
        'attribute' => $failure->attribute(),
        'row' => $failure->row(),                  
        'errors' => json_encode($failure->errors()),
      ];
    }
    ImportStatus::find($this->importStatusId)
    ->update([
      'status' => 'failed',
      'errors' => $data
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
