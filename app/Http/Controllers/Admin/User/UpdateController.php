<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, User $user)
    {
      try {
        $softDeletedUser = User::onlyTrashed()->where('email', $request->email);
        if ($softDeletedUser) {
          $softDeletedUser->forceDelete();
        }

        $data = $request->validated();

        if (isset($data['password'])) {
          $data['password'] = Hash::make($data['password']);
          $user->update($data);
        } else {
          unset($data['password']);
          $user->update($data);
        }
        return view('admin.users.show', compact('user'));
      } catch (Exception $exception) {
        abort(404);
      }
      
    }
}
