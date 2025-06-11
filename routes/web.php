<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\PasswordPolicyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('user-groups', UserGroupController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('password-policies', PasswordPolicyController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('user-groups', UserGroupController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('password-policies', PasswordPolicyController::class);

});

  Route::middleware(['auth'])->group(function () {
    Route::resource('subscriptions', SubscriptionController::class);
  });


    Route::resource('users', UserController::class)->middleware('auth');





require __DIR__.'/auth.php';
