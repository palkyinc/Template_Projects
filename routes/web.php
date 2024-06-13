<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

###TEST
/* 
use Illuminate\Support\Facades\Config; //TEST
 */

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
    return view('welcome',);
});

Route::get('/dashboard', function () {
    return view('dashboard',['principal' => 'active']);
})->middleware(['auth', 'verifyEmail'])->name('dashboard');

### CRUD User
Route::get('/adminUsers', [UserController::class, 'index'])->middleware(['auth', 'verifyEmail']);
Route::get('/modificarUser/{id}', [UserController::class, 'edit'])->middleware(['auth', 'verifyEmail']);
Route::patch('/modificarUser', [UserController::class, 'update'])->middleware(['auth', 'verifyEmail']);
Route::get('/agregarRoleToUser/{id}', [UserController::class, 'show'])->middleware(['auth', 'verifyEmail']);
Route::patch('/agregarRoleToUser', [UserController::class, 'updateRoleToUser'])->middleware(['auth', 'verifyEmail']);
Route::get('/agregarUser', [UserController::class, 'create'])->middleware(['auth', 'verifyEmail']);
Route::post('/agregarUser', [UserController::class, 'store'])->middleware(['auth', 'verifyEmail']);
Route::get('userChangeViewMode', [UserController::class, 'changeViewMode'])->middleware(['auth', 'verifyEmail']);
####### CRUD Roles 
Route::get('/adminRoles', [RoleController::class, 'index'])->middleware(['auth', 'verifyEmail']);
Route::get('/modificarRole/{id}', [RoleController::class, 'edit'])->middleware(['auth', 'verifyEmail']);
Route::patch('/modificarRole', [RoleController::class, 'update'])->middleware(['auth', 'verifyEmail']);
Route::get('/agregarPermissionsToRole/{id}', [RoleController::class, 'show'])->middleware(['auth', 'verifyEmail']);
Route::patch('/agregarPermissionsToRole', [RoleController::class, 'updatePermissionsToRole'])->middleware(['auth', 'verifyEmail']);
Route::get('/agregarRole', [RoleController::class, 'create'])->middleware(['auth', 'verifyEmail']);
Route::post('/agregarRole', [RoleController::class, 'store'])->middleware(['auth', 'verifyEmail']);
####### CRUD Permissions
Route::get('/adminPermissions', [PermissionController::class, 'index'])->middleware(['auth', 'verifyEmail']);
Route::get('/factoryPermissions', [PermissionController::class, 'factoryPermissions'])->middleware(['auth', 'verifyEmail']);
Route::get('/modificarPermission/{id}', [PermissionController::class, 'edit'])->middleware(['auth', 'verifyEmail']);
Route::patch('/modificarPermission', [PermissionController::class, 'update'])->middleware(['auth', 'verifyEmail']);
Route::get('/agregarPermissionToRoles/{id}', [PermissionController::class, 'show'])->middleware(['auth', 'verifyEmail']);
Route::patch('/agregarPermissionToRoles', [PermissionController::class, 'updatePermissionToRoles'])->middleware(['auth', 'verifyEmail']);
Route::get('/agregarPermission', [PermissionController::class, 'create'])->middleware(['auth', 'verifyEmail']);
Route::post('/agregarPermission', [PermissionController::class, 'store'])->middleware(['auth', 'verifyEmail']);
####### Auth Routes
require __DIR__.'/auth.php';
