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
        $file = $request->file('file')->store('import');
        $import = new CulturesImport;
        $import->import($file);
        return back()->withStatus('Данные импортируются');        
      } else {        
        return back()->withErrors('Файл не найден');
      }        
    }
}
