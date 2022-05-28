<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Filters\CustomerFilter;
use App\Models\Customer;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      $notifications = auth()->user()->unreadNotifications;  

      $regions = Customer::all()->pluck('region')->toArray();
      $regions = array_unique($regions);

      $data = $request->input(); 
      $filter = app()->make(CustomerFilter::class, ['queryParams' => array_filter($data)]);

      $customers = Customer::filter($filter)->cursor();
         
      return view('admin.customers.index', compact('customers', 'regions', 'notifications'));
    }
}
