<?php

namespace App\Http\Controllers\Admin\Deleted;

use App\Http\Filters\CustomerFilter;
use App\Http\Controllers\Controller;
use App\Models\Customer;
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
      $regions = Customer::onlyTrashed()->pluck('region')->toArray();
      $regions = array_unique($regions);      

      $customers = Customer::onlyTrashed()->get();
         
      return view('admin.deleted.customers.index', compact('customers', 'regions'));
    }
}
