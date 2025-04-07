<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskForStaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [StatisticsController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Permission route
    Route::get('/permissions/list', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('permissions/{id}', [PermissionController::class, 'destroy']) -> name('permissions.destroy');

    // Role route
    Route::get('/roles/list', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy']) -> name('roles.destroy');

    //User roles
    Route::get('/users/list', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy']) -> name('users.destroy');

    //Settings
    Route::resource('settings', SettingController::class)->names([
        'index'   => 'settings.index',
        'create'  => 'settings.create',
        'store'   => 'settings.store',
        'edit'    => 'settings.edit',
        'update'  => 'settings.update',
        'destroy' => 'settings.destroy',
    ]);;

    Route::prefix('admin')->group(function () {
        Route::get('/about', [AboutController::class, 'index'])->name('admin.about.index');
        Route::get('/about/create', [AboutController::class, 'create'])->name('admin.about.create');
        Route::post('/about', [AboutController::class, 'store'])->name('admin.about.store');
        Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('admin.about.edit');
        Route::put('/about/{id}', [AboutController::class, 'update'])->name('admin.about.update');
        Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('admin.about.destroy');
        Route::post('/team/store', [AboutController::class, 'storeTeam'])->name('team.store');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/works', [WorkController::class, 'index'])->name('admin.work.index');
        Route::get('/works/create', [WorkController::class, 'create'])->name('admin.work.create');
        Route::post('/works', [WorkController::class, 'store'])->name('admin.work.store');
        Route::get('/works/{id}/edit', [WorkController::class, 'edit'])->name('admin.work.edit');
        Route::put('/works/{id}', [WorkController::class, 'update'])->name('admin.work.update');
        Route::delete('/works/{id}', [WorkController::class, 'destroy'])->name('admin.work.destroy');
    });

    // //HomePage
    Route::get('/',[HomeController::class, 'index'])->name('base');
    Route::get('/home',[HomeController::class, 'home'])->name('home');
    Route::get('/about',[HomeController::class, 'about'])->name('about');
    Route::get('/contact',[HomeController::class, 'contact'])->name('contact');
    Route::get('/location',[HomeController::class, 'location'])->name('location');
    Route::get('/price',[HomeController::class, 'price'])->name('price');
    Route::get('/service',[HomeController::class, 'services'])->name('services');
    Route::get('/service/{service}', [HomeController::class, 'show'])->name('service.show');


    Route::get('/services', [BookingController::class, 'index'])->name('services');
    Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/times', [BookingController::class, 'getAvailableTimes']);


    Route::resource('services', ServiceController::class)->names([
        'index'   => 'service.index',
        'create'  => 'service.create',
        'store'   => 'service.store',
        'edit'    => 'service.edit',
        'update'  => 'service.update',
        'destroy' => 'service.destroy',
    ]);;


});

require __DIR__.'/auth.php';
