<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Exports\CulturesExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      return Excel::download(new CulturesExport, 'cultures-collection.xlsx');
    }
}
