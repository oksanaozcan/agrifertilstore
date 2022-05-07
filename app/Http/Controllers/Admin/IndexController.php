<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Culture;
use App\Models\Customer;
use App\Models\Fertilizer;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function __invoke()
  {
    $culturesCount = Culture::count();
    $fertilizersCount = Fertilizer::count();
    $customersCount = Customer::count();
    $usersCount = User::count();
    $tagsCount = Tag::count();
    $contactsCount = Contact::count();
    
    return view('admin.index', compact('culturesCount', 'fertilizersCount', 'customersCount', 'usersCount', 'tagsCount', 'contactsCount'));
  }
}
