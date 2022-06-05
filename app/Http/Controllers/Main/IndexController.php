<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Filters\CultureFilter;
use App\Http\Requests\Main\IndexRequest;
use App\Models\Culture;
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
      $regions = Culture::all()->pluck('region')->toArray();
      $regions = array_unique($regions);   

      $data = $request->input();           

      $filter = app()->make(CultureFilter::class, ['queryParams' => array_filter($data)]);

      $cultures = Culture::filter($filter)->paginate(8);      
      
      return view('main.index', compact('cultures', 'regions'));
    }
}
