<?php

namespace App\Imports;

use App\Models\Customer;
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

class CustomersImport implements 
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
      'name' => 'required|string',
      'contract_date' => 'required|numeric',
      'cost' => 'required|numeric',
      'region' => 'required|string'
    ];
  } 
    
  public function model(array $row)
  {
    ImportStatus::find($this->importStatusId)
      ->update(['status' => 'success']);

    return new Customer([
      'name' => $row['name'],
      'contract_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['contract_date']),
      'cost' => $row['cost'],
      'region' => $row['region']      
    ]);        
  }

  public function customValidationMessages()
  {
    return [
      'name.required' => 'Поле name не заполнено',      
      'name.string' => 'Поле name должно быть строкой',
      'contract_date.required' => 'Поле contract_date не заполнено',     
      'contract_date.numeric' => 'Поле contract_date должно быть числом',     
      'cost.required' => 'Поле cost не заполнено',
      'cost.numeric' => 'Поле cost должно быть числом',
      'region.required' => 'Поле region не заполнено',
      'region.string' => 'Поле region должно быть строкой',
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
