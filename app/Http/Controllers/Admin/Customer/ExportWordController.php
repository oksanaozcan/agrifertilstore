<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportWordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Customer $customer)
    {
      $date = \Carbon\Carbon::parse(Date::now())->format('d/m/Y');
      $contract_date = \Carbon\Carbon::parse($customer->contract_date)->format('d/m/Y');
      $templateProcessor = new TemplateProcessor('word-template/customer.docx');      
      $templateProcessor->setValue('name', $customer->name);
      $templateProcessor->setValue('contract_date', $contract_date);
      $templateProcessor->setValue('cost', $customer->cost);
      $templateProcessor->setValue('date', $date);
      
      $fileName = $customer->name;
      $templateProcessor->saveAs($fileName . '.docx');
      
      return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }
}
