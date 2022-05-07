<?php

namespace App\Http\Controllers\Admin\Deleted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fertilizer;

class IndexFertilizerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
      $fertilizers = Fertilizer::onlyTrashed()->get();
         
      return view('admin.deleted.fertilizers.index', compact('fertilizers'));
    }
}
