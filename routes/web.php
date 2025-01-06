<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskForStaffController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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


    // Article route
    Route::get('/articles/list', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy']) -> name('articles.destroy');

    //User roles
    Route::get('/users/list', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy']) -> name('users.destroy');

    //Task route
    Route::get('/tasks/list', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('tasks/list/done', [TaskController::class, 'getTasksISDone'])->name('tasks.done');
    Route::patch('tasks/{id}/done', [TaskController::class, 'done']) -> name('task.done');
    Route::get('/tasks/{id}/cancel', [TaskController::class, 'cancel'])->name('task.cancel');
    Route::get('/tasks/{id}/view', [TaskController::class, 'viewTask'])->name('tasks.view');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');


    //Task route for staff user
    Route::get('/tasks/staff/list', [TaskForStaffController::class, 'list_task'])->name('staff.list');
    Route::get('/task/{id}/done',[TaskForStaffController::class, 'task_done'])->name('staff.done');
    Route::get('/tasks/{id}/staff-view', [TaskForStaffController::class, 'staffView'])->name('staff.view');
    Route::post('/tasks/{id}/upload-file', [TaskForStaffController::class, 'uploadFile'])->name('staff.upload-file');



 







});

require __DIR__.'/auth.php';
