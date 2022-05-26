<?php

use App\Http\Controllers\Admin\Culture\MarkNotificationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', App\Http\Controllers\Main\IndexController::class)->name('main');
Route::get('/filter', App\Http\Controllers\Main\FilterController::class)->name('filter');

Route::prefix('contacts')->group(function () {
  Route::get('/', App\Http\Controllers\Contact\IndexController::class)->name('contact.index');
  Route::post('/', App\Http\Controllers\Contact\StoreController::class)->name('contact.store');
});

Route::middleware(['auth'])->group(function () {

  Route::prefix('admin')->group(function () {
    Route::get('/', App\Http\Controllers\Admin\IndexController::class)->name('admin');

    Route::prefix('fertilizers')->group(function () {
      Route::get('/', App\Http\Controllers\Admin\Fertilizer\IndexController::class)->name('admin.fertilizers.index');
      Route::get('/create', App\Http\Controllers\Admin\Fertilizer\CreateController::class)->name('admin.fertilizers.create');
      Route::post('/', App\Http\Controllers\Admin\Fertilizer\StoreController::class)->name('admin.fertilizers.store');
      Route::get('/{fertilizer}', App\Http\Controllers\Admin\Fertilizer\ShowController::class)->name('admin.fertilizers.show');
      Route::get('/{fertilizer}/edit', App\Http\Controllers\Admin\Fertilizer\EditController::class)->name('admin.fertilizers.edit');
      Route::patch('/{fertilizer}', App\Http\Controllers\Admin\Fertilizer\UpdateController::class)->name('admin.fertilizers.update');
      Route::delete('/{fertilizer}', App\Http\Controllers\Admin\Fertilizer\DeleteController::class)->name('admin.fertilizers.delete');      
    });

    Route::prefix('tags')->group(function () {
      Route::get('/', App\Http\Controllers\Admin\Tag\IndexController::class)->name('admin.tags.index');
      Route::get('/create', App\Http\Controllers\Admin\Tag\CreateController::class)->name('admin.tags.create');
      Route::post('/', App\Http\Controllers\Admin\Tag\StoreController::class)->name('admin.tags.store');
      Route::get('/{tag}', App\Http\Controllers\Admin\Tag\ShowController::class)->name('admin.tags.show');
      Route::get('/{tag}/edit', App\Http\Controllers\Admin\Tag\EditController::class)->name('admin.tags.edit');
      Route::patch('/{tag}', App\Http\Controllers\Admin\Tag\UpdateController::class)->name('admin.tags.update');
      Route::delete('/{tag}', App\Http\Controllers\Admin\Tag\DeleteController::class)->name('admin.tags.delete');
    });

    Route::prefix('cultures')->group(function () {
      Route::post('/mark-as-read', [MarkNotificationController::class, 'markAsRead'] )->name('markNotification');      
      Route::post('/mark-all-as-read', [MarkNotificationController::class, 'markAllAsRead'] )->name('markallasread');      
      Route::get('/', App\Http\Controllers\Admin\Culture\IndexController::class)->name('admin.cultures.index');      
      Route::post('file-import', App\Http\Controllers\Admin\Culture\ImportController::class)->name('admin.cultures.file-import');
      Route::get('file-export', App\Http\Controllers\Admin\Culture\ExportController::class)->name('admin.cultures.file-export');
      Route::get('/filter', App\Http\Controllers\Admin\Culture\FilterController::class)->name('admin.cultures.filter');
      Route::get('/create', App\Http\Controllers\Admin\Culture\CreateController::class)->name('admin.cultures.create');
      Route::post('/', App\Http\Controllers\Admin\Culture\StoreController::class)->name('admin.cultures.store');
      Route::get('/{culture}', App\Http\Controllers\Admin\Culture\ShowController::class)->name('admin.cultures.show');
      Route::get('/{culture}/edit', App\Http\Controllers\Admin\Culture\EditController::class)->name('admin.cultures.edit');
      Route::patch('/{culture}', App\Http\Controllers\Admin\Culture\UpdateController::class)->name('admin.cultures.update');
      Route::delete('/{culture}', App\Http\Controllers\Admin\Culture\DeleteController::class)->name('admin.cultures.delete');
    });

    Route::prefix('customers')->group(function () {
      Route::get('/', App\Http\Controllers\Admin\Customer\IndexController::class)->name('admin.customers.index');
      Route::get('/filter', App\Http\Controllers\Admin\Customer\FilterController::class)->name('admin.customers.filter');
      Route::get('/create', App\Http\Controllers\Admin\Customer\CreateController::class)->name('admin.customers.create');
      Route::post('/', App\Http\Controllers\Admin\Customer\StoreController::class)->name('admin.customers.store');
      Route::get('/{customer}', App\Http\Controllers\Admin\Customer\ShowController::class)->name('admin.customers.show');
      Route::get('/{customer}/edit', App\Http\Controllers\Admin\Customer\EditController::class)->name('admin.customers.edit');
      Route::patch('/{customer}', App\Http\Controllers\Admin\Customer\UpdateController::class)->name('admin.customers.update');
      Route::delete('/{customer}', App\Http\Controllers\Admin\Customer\DeleteController::class)->name('admin.customers.delete');
    });

    Route::prefix('users')->group(function () {
      Route::get('/', App\Http\Controllers\Admin\User\IndexController::class)->name('admin.users.index');
      Route::get('/create', App\Http\Controllers\Admin\User\CreateController::class)->name('admin.users.create');
      Route::post('/', App\Http\Controllers\Admin\User\StoreController::class)->name('admin.users.store');
      Route::get('/{user}', App\Http\Controllers\Admin\User\ShowController::class)->name('admin.users.show');
      Route::get('/{user}/edit', App\Http\Controllers\Admin\User\EditController::class)->name('admin.users.edit');
      Route::patch('/{user}', App\Http\Controllers\Admin\User\UpdateController::class)->name('admin.users.update');
      Route::delete('/{user}', App\Http\Controllers\Admin\User\DeleteController::class)->name('admin.users.delete');
    });

    Route::prefix('deleted')->group(function () {
      Route::get('/', App\Http\Controllers\Admin\Deleted\IndexController::class)->name('admin.deleted.index');
      Route::get('/fertilizers', App\Http\Controllers\Admin\Deleted\IndexFertilizerController::class)->name('admin.deleted.fertilizers.index');
      Route::get('/tags', App\Http\Controllers\Admin\Deleted\IndexTagController::class)->name('admin.deleted.tags.index');
      Route::get('/cultures', App\Http\Controllers\Admin\Deleted\IndexCultureController::class)->name('admin.deleted.cultures.index');
      Route::get('/customers', App\Http\Controllers\Admin\Deleted\IndexCustomerController::class)->name('admin.deleted.customers.index');      
      Route::get('/users', App\Http\Controllers\Admin\Deleted\IndexUserController::class)->name('admin.deleted.users.index');
    });

    Route::prefix('status-import')->group(function () {      
      Route::get('/cultures', App\Http\Controllers\Admin\StatusImport\IndexCultureController::class)->name('admin.statusimport.cultures.index');               
      Route::get('/cultures/{importstatus}', App\Http\Controllers\Admin\StatusImport\ShowCultureController::class)->name('admin.statusimport.cultures.show');               
    });

    Route::prefix('contacts')->group(function () {
      Route::get('/', App\Http\Controllers\Admin\Contact\IndexController::class)->name('admin.contacts.index');      
      Route::delete('/{contact}', App\Http\Controllers\Admin\Contact\DeleteController::class)->name('admin.contacts.delete');
    });

  });
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
  return redirect('/admin');
});

Route::get('/register', function () {
  return redirect('/');
});
