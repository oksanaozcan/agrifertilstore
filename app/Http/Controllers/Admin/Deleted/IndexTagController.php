<?php

namespace App\Http\Controllers\Admin\Deleted;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexTagController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      $tags = Tag::onlyTrashed()->get();

      return view('admin.deleted.tags.index', compact('tags'));
    }
}
