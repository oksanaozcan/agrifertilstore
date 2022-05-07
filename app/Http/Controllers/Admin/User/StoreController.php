<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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
      $softDeletedUser = User::onlyTrashed()->where('email', $request->email);
      if ($softDeletedUser) {
        $softDeletedUser->forceDelete();
      }

      $data = $request->validated();
      $data['password'] = Hash::make($data['password']);
      User::firstOrCreate(['email' => $data['email']], $data);

      return redirect()->route('admin.users.index');
    }
}
