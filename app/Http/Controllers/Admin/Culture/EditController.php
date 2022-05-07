<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\Fertilizer;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Culture $culture)
    {
      $fertilizers = Fertilizer::all();
      $tags = Tag::all();
      return view('admin.cultures.edit', compact('culture', 'fertilizers', 'tags'));
    }
}
