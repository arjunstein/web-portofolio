<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\DashboardController;
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
    Route::get('/about/{id}', [AboutController::class, 'index'])->name('backend.about');
    Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('backend.about.edit');
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('backend.about.update');
    Route::get('/about/change_password', [AboutController::class, 'changePassword'])->name('backend.about.change-password');
});

Auth::routes();

Route::get('/logout', function () {
    return redirect()->back();
});

Route::fallback(function () {
    return redirect('pages-error-404.html');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
