<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.login');
});

Route::get('/dashboard', function () {
    return view('admin.control-panel');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth' , 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::prefix('admin')->middleware(['admin', 'verified'])->group( function(){

    Route::get('/users', [UsersController::class, 'showUsers'])->name('users');

    Route::get('/user-new', [UsersController::class, 'newUser'])->name('users.new');

    Route::post('/user-new', [UsersController::class, 'createUser'])->name('users.create');

    // edit users
    Route::get('/user-edit{id}', [UsersController::class, 'showEditForm'])->name('users.editForm');

    Route::put('/user-edit{id}', [UsersController::class, 'updateUsers'])->name('users.update');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group( function(){

    Route::get('/profile/{id}', [ProfilController::class, 'showProfile'])->name('user.profile');

    Route::put('/profile/{id}', [ProfilController::class, 'updateProfile'])->name('user.profile-update');

    Route::put('reset-password', [ProfilController::class, 'resetPassword'])->name('user.reset-password');

});


require __DIR__.'/auth.php';
