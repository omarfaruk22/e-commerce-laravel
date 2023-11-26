<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\AdminController;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard.index');
})->middleware(['auth', 'verified','can:dashboard.view'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix'=>'/role'],function(){
        Route::get('/role.create',[RolesController::class, 'create'])->name('rolecreate')->middleware('can:role.create');
        Route::post('/role.save',[RolesController::class, 'store'])->name('rolesave')->middleware('can:role.create');
        Route::get('/role.manage',[RolesController::class, 'index'])->name('rolemanage')->middleware('can:role.view');
        Route::get('/role.edit/{id}',[RolesController::class, 'edit'])->name('roleedit')->middleware('can:role.edit');
        Route::post('/role.update/{id}',[RolesController::class, 'update'])->name('roleupdate')->middleware('can:role.edit');
        Route::any('/role.delete/{id}',[RolesController::class, 'delete'])->name('roledelete')->middleware('can:role.delete');
        });

        Route::group(['prefix'=>'/admin'],function(){
            Route::get('/admin.create',[AdminController::class, 'create'])->name('admincreate')->middleware('can:admin.create');
            Route::post('/admin.save',[AdminController::class, 'store'])->name('adminsave')->middleware('can:admin.create');
            Route::get('/admin.manage',[AdminController::class, 'index'])->name('adminmanage')->middleware('can:admin.view');
            Route::get('/admin.edit/{id}',[AdminController::class, 'edit'])->name('adminedit')->middleware('can:admin.edit');
            Route::post('/admin.update/{id}',[AdminController::class, 'update'])->name('adminupdate')->middleware('can:admin.edit');
            Route::any('/admin.delete/{id}',[AdminController::class, 'delete'])->name('admindelete')->middleware('can:admin.delete');
            });

});

require __DIR__.'/auth.php';
