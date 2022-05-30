<?php

namespace App\Exports;

use App\Models\Culture;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CulturesExport extends AbstractExport

{
  public function columnWidths(): array
  {
    return [
      'H' => 55,               
    ];
  }

  public function query()
  {
      return Culture::query()->with('fertilizer');
  }

  public function columnFormats(): array
  {
    return [
      'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    ];
  }

  public function map($culture): array
  {
      return [
          $culture->name,
          $culture->nitrogen,
          $culture->phosphorus,
          $culture->potassium,
          $culture->fertilizer->name,
          $culture->region,
          $culture->price,
          $culture->description,
          $culture->purpose,
          Date::dateTimeToExcel($culture->created_at),
      ];
  }

  public function title(): string
  {
    $date = Carbon::now(); 
    return 'Экспорт культур от '. $date;
  }

  public function headings(): array
  {
    $date = Carbon::now(); 

    return [
      [
        "Список культур по состоянию на ".$date,
      ],
      ["Наименование",
      "азот",
      "фосфор",
      "калий",
      "категория",  
      "регион",
      "цена",
      "описание",
      "предназначение",
      "дата создания"],
    ];
  }  
}
