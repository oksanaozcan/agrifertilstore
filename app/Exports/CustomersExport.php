<?php

namespace App\Exports;

use App\Models\Customer;
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

class CustomersExport implements 
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
    return [];
  }

  public function query()
  {
      return Customer::query();
  }

  public function columnFormats(): array
  {
    return [    
      'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,    
    ];
  }

  public function map($customer): array
  {
      return [
          $customer->name,
          $customer->contract_date,
          $customer->cost,
          $customer->region,          
          Date::dateTimeToExcel($customer->created_at),
      ];
  }

  public function title(): string
  {
    $date = Carbon::now(); 
    return 'Экспорт клиентов от '. $date;
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
        "Список клиентов по состоянию на ".$date,
      ],
      ["Наименование",
      "дата контракта",
      "стоимость",
      "регион",    
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