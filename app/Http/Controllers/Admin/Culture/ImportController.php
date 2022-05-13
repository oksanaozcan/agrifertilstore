<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Imports\CulturesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      if ($request->hasFile('file')) {
        Excel::import(new CulturesImport, $request->file('file')->store('temp'));
        return back();   
      } else {        
        return back()->withErrors('Файл не найден');
      }
        
    }
}
