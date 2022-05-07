<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\UpdateRequest;
use App\Models\Culture;
use Exception;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, Culture $culture)
    {
      try {
        $data = $request->validated();

        if (isset($data['tags'])) {
          $tags = $data['tags'];
          unset($data['tags']);
        }        

        $culture->update($data);
        if (isset($tags)) {
          $culture->tags()->sync($tags);
        }
        
        return view('admin.cultures.show', compact('culture'));        

      } catch (Exception $exception) {
        abort(404);
      }
      
    }
}
