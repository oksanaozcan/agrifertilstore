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
        'name.required' => '???????? name ???? ??????????????????',
        'name.unique' => '???????????????????????? ???????????? ???????????? ???????? ????????????????????',
        'nitrogen.required' => '???????? nitrogen ???? ??????????????????',
        'nitrogen.numeric' => '???????? nitrogen ???????????? ???????? ????????????',
        'phosphorus.required' => '???????? phosphorus ???? ??????????????????',
        'phosphorus.numeric' => '???????? phosphorus ???????????? ???????? ????????????',
        'potassium.required' => '???????? potassium ???? ??????????????????',
        'potassium.numeric' => '???????? potassium ???????????? ???????? ????????????',
        'fertilizer_id.required' => '???????? fertilizer_id ???? ??????????????????',
        'fertilizer_id.integer' => '???????? fertilizer_id ???????????? ???????? ?????????? ????????????',
        'region.required' => '???????? region ???? ??????????????????',
        'region.string' => '???????? region ???????????? ???????? ??????????????',
        'price.required' => '???????? price ???? ??????????????????',
        'price.numeric' => '???????? price ???????????? ???????? ????????????',
        'description.required' => '???????? description ???? ??????????????????',
        'description.string' => '???????? description ???????????? ???????? ??????????????',
        'purpose.required' => '???????? purpose ???? ??????????????????',
        'purpose.string' => '???????? purpose ???????????? ???????? ??????????????',
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
