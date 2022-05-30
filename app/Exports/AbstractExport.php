<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

abstract class AbstractExport implements 
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

  public function startCell(): string
  {
    return 'A5';
  }

  public function columnWidths(): array
  {
    return [];
  }
}