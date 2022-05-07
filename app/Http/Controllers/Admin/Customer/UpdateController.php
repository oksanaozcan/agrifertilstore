<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\UpdateRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, Customer $customer)
    {
      $data = $request->validated();
      $customer->update($data);

      return view('admin.customers.show', compact('customer'));
    }
}
