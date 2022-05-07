<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\StoreRequest;
use App\Models\Culture;
use Exception;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {
      try {

        $data = $request->validated();

        if (isset($data['tags'])) {
          $tags = $data['tags'];
          unset($data['tags']);
        }        

        $culture = Culture::firstOrCreate($data);
        if (isset($tags)) {
          $culture->tags()->attach($tags);
        }

      } catch (Exception $exception) {
        abort(404);
      }
      return redirect()->route('admin.cultures.index');
    }
}
