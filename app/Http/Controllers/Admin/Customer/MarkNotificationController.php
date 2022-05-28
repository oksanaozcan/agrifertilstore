<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkNotificationController extends Controller
{
  public function markAsRead(Request $request)
  {
    $notifications = auth()->user()->unreadNotifications;
    foreach ($notifications as $notification) {
      if ($notification->id == $request->id) {
        $notification->markAsRead();
      }
    }    
    return redirect()->route('admin.customers.index');
  }

  public function markAllAsRead (Request $request)
  {
    $user = auth()->user();
    foreach ($user->unreadNotifications as $notification) {
      $notification->markAsRead();
    }
    return redirect()->route('admin.customers.index');
  }
}
