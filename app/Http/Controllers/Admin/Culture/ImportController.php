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
      
      try {
        Excel::import(new CulturesImport, request()->file('file'));
        
        //if success -> 
        $importStatus = ImportStatus::create([
          'path' => $file,
          'importable' => 'App\Models\Culture',
          'status' => 'success',
          'user_id' => auth()->id()
        ]);
        
        return back()->withStatus('Import done!');
      } catch (Throwable $e) {
        report($e);
      }                
    }
}
