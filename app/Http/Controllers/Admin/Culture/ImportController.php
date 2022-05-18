<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Imports\CulturesImport;
use App\Models\ImportStatus;
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

      $importStatus = new ImportStatus();
      $importStatus::create([
        'path' => $file,
        'module' => 'Culture',
        'status' => 'processing',
        'user_id' => auth()->user()->id
      ]);
     
      Excel::import(new CulturesImport, $file);            
      return back()->withStatus('File imported to storage! We will send you notify, when it will be imported into database');
     
    }
}