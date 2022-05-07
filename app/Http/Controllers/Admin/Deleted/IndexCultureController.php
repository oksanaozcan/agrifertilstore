<?php

namespace App\Http\Controllers\Admin\Deleted;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class IndexCultureController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      $cultures = Culture::onlyTrashed()->get();

      return view('admin.deleted.cultures.index', compact('cultures'));
    }
}
