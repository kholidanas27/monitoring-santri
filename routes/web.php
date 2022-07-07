<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [AdminController::class, 'index']);
Route::get('/', function () {
    if(Auth::check()){
        return view('home');
    }
    else{
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', [AdminController::class, 'index'])->name('home');
