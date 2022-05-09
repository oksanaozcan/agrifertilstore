<?php

namespace App\Imports;

use App\Models\Culture;
use Maatwebsite\Excel\Concerns\ToModel;

class CulturesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      return new Culture([
        'name' => $row[0],
        'nitrogen' => $row[1],
        'phosphorus' => $row[2],
        'potassium' => $row[3],
        'fertilizer_id' => $row[4],           
        'region' => $row[5],
        'price' => $row[6],
        'description' => $row[7],
        'purpose' => $row[8]
      ]);
    }
}
