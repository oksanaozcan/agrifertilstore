<?php

namespace App\Exports;

use App\Models\Culture;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CulturesExport implements 
FromQuery, 
WithMapping,
ShouldAutoSize,
WithTitle,
WithCustomStartCell,
WithColumnFormatting,
WithColumnWidths,
WithStyles,
WithDrawings,
WithHeadings

{
  use Exportable;

  public function drawings()
  {
    $drawing = new Drawing();
    $drawing->setName('Logo');
    $drawing->setDescription('Happy Plant');
    $drawing->setPath(public_path('/logo.png'));
    $drawing->setHeight(50);
    $drawing->setCoordinates('A1');

    return $drawing;
  }

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

  public function startCell(): string
  {
    return 'A5';
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

  public function styles(Worksheet $sheet)
  {
    return [
      5 => [
        'font' => [
          'bold' => true,
          'size' => 14
        ],        
      ],
      6 => [
        'borders' => [
          'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
            'color' => ['argb' => '5BC0DE'],
          ],
        ],
      ],
    ];
  }  
}
