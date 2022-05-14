<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Imports\CulturesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

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
      $request->validate([
        'file' => 'required',
      ]);
      $file = $request->file('file')->store('import');
      $import = new CulturesImport;
      $import->import($file);
      return back()->withStatus('Import done!');         
    }
}
