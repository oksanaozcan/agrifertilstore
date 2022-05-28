<?php

namespace App\Http\Controllers\Admin\StatusImport;

use App\Http\Controllers\Controller;
use App\Models\ImportStatus;
use Illuminate\Http\Request;

class IndexCustomerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      $importStatuses = ImportStatus::where('module', 'Customer')->get();
      return view('admin.import_status.customers.index', compact('importStatuses'));
    }
}
