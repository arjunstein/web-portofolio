<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




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
    return view('welcome');
});

Route::prefix('backend')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class,  'index'])->name('backend.dashboard');
});

Auth::routes();

Route::get('/logout', function () {
    return redirect()->back();
});

Route::fallback(function () {
    return redirect('pages-error-404.html');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
