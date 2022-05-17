<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {      
      $tags = Tag::all();
      $fertilizers = Fertilizer::all(['id', 'name']);
      return view('admin.cultures.create', compact('tags', 'fertilizers'));
    }
}
