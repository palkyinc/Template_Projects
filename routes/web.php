<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('userChangeViewMode', [UserController::class, 'changeViewMode'])->middleware(['auth', 'verifyEmail'])->name('user.index');

require __DIR__.'/auth.php';
