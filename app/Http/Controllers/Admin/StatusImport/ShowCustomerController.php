<?php

namespace App\Http\Controllers\Admin\StatusImport;

use App\Http\Controllers\Controller;
use App\Models\ImportStatus;
use Illuminate\Http\Request;

class ShowCustomerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ImportStatus $importstatus)
    {
      $errorsArray = json_decode($importstatus->errors, true);        
      
      $data = [];

      if ($errorsArray) {
        foreach ($errorsArray as $erArray) {       

          $string = substr_replace($erArray["errors"],"", -1);  
          $string = substr($string, 1);
          $string = json_decode($string);
          $erArray["errors"] = substr_replace($erArray["errors"], $string, 0);
         
          $data[] = $erArray;        
        }
      }
       
      return view('admin.import_status.customers.show', compact('importstatus', 'data'));
    }
}
