<?php

namespace App\Exports;

use App\Models\Customer;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CustomersExport extends AbstractExport
{
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
}