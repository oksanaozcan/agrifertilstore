<?php

namespace App\Http\Controllers\Admin\StatusImport;

use App\Http\Controllers\Controller;
use App\Models\ImportStatus;
use Illuminate\Http\Request;

class ShowCultureController extends Controller
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
      // dd($errorsArray[0][ "attribute"]);
      return view('admin.import_status.cultures.show', compact('importstatus', 'errorsArray'));
    }
}
