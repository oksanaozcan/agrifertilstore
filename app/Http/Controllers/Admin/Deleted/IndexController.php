<?php

namespace App\Http\Controllers\Admin\Deleted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Culture;
use App\Models\Customer;
use App\Models\Fertilizer;
use App\Models\Tag;
use App\Models\User;

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
      $culturesCount = Culture::onlyTrashed()->count();
      $fertilizersCount = Fertilizer::onlyTrashed()->count();
      $customersCount = Customer::onlyTrashed()->count();
      $usersCount = User::onlyTrashed()->count();
      $tagsCount = Tag::onlyTrashed()->count();
      return view('admin.deleted.index', compact('culturesCount', 'fertilizersCount', 'customersCount', 'usersCount', 'tagsCount'));
    }
}
