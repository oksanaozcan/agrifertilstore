<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Http\Filters\CultureFilter;
use App\Models\Culture;
use App\Models\Fertilizer;
use App\Models\Tag;
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
      $tags = Tag::all(['id', 'name']);
      $fertilizers = Fertilizer::all(['id', 'name']);

      $regions = Culture::all()->pluck('region')->toArray();
      $regions = array_unique($regions);

      $data = $request->input();
      $filter = app()->make(CultureFilter::class, ['queryParams' => array_filter($data)]);

      $cultures = Culture::filter($filter)->cursor();
         
      return view('admin.cultures.index', compact('cultures', 'fertilizers', 'tags', 'regions'));
    }
}
