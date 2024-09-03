<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\CertificateController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EducationController;
use App\Http\Controllers\Backend\ExperienceController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\SkillController;
use App\Http\Controllers\FrontController;
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

Route::get('/', [FrontController::class, 'index']);
Route::post('/linkedin-click', [FrontController::class, 'linkedinClick'])->name('linkedin.click');
Route::post('/ig-click', [FrontController::class, 'igClick'])->name('ig.click');
Route::post('/fb-click', [FrontController::class, 'fbClick'])->name('fb.click');
Route::post('/wa-click', [FrontController::class, 'waClick'])->name('wa.click');
Route::post('/gdrive-click', [FrontController::class, 'gdriveClick'])->name('gdrive.click');
Route::post('/twitter-click', [FrontController::class, 'twitterClick'])->name('twitter.click');

Route::prefix('backend')->middleware('auth')->group(function () {
    // dashboard route
    Route::get('/dashboard', [DashboardController::class,  'index'])->name('backend.dashboard');

    // about route
    Route::get('/about/{id}', [AboutController::class, 'index'])->name('backend.about');
    Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('backend.about.edit');
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('backend.about.update');
    Route::get('/about/change_password/{id}', [AboutController::class, 'changePassword'])->name('backend.about.change-password');
    Route::post('/about/update_password', [AboutController::class,  'updatePassword'])->name('backend.about.update-password');

    // skills route
    Route::get('/skills', [SkillController::class, 'index'])->name('backend.skills');
    Route::get('/skills/create', [SkillController::class, 'create'])->name('backend.skills.create');
    Route::post('/skills', [SkillController::class, 'store'])->name('backend.skills.store');
    Route::get('/skills/edit/{id}', [SkillController::class, 'edit'])->name('backend.skills.edit');
    Route::put('/skills/update/{id}', [SkillController::class, 'update'])->name('backend.skills.update');
    Route::delete('/skills/delete/{id}', [SkillController::class, 'destroy'])->name('backend.skills.delete');

    // education route
    Route::get('/education', [EducationController::class, 'index'])->name('backend.education');
    Route::get('/education/create', [EducationController::class, 'create'])->name('backend.education.create');
    Route::post('/education/store', [EducationController::class, 'store'])->name('backend.education.store');
    Route::get('/education/edit/{id}', [EducationController::class, 'edit'])->name('backend.education.edit');
    Route::put('/education/update/{id}', [EducationController::class, 'update'])->name('backend.education.update');
    Route::delete('/education/delete/{id}', [EducationController::class, 'destroy'])->name('backend.education.delete');

    // experience route
    Route::get('/experience', [ExperienceController::class, 'index'])->name('backend.experience');
    Route::get('/experience/create', [ExperienceController::class, 'create'])->name('backend.experience.create');
    Route::post('/experience/store', [ExperienceController::class, 'store'])->name('backend.experience.store');
    Route::get('/experience/edit/{id}', [ExperienceController::class, 'edit'])->name('backend.experience.edit');
    Route::put('/experience/update/{id}', [ExperienceController::class, 'update'])->name('backend.experience.update');
    Route::delete('/experience/delete/{id}', [ExperienceController::class, 'destroy'])->name('backend.experience.delete');

    // projects route
    Route::get('/project', [ProjectController::class, 'index'])->name('backend.project');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('backend.project.create');
    Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('backend.project.edit');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('backend.project.store');
    Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('backend.project.update');
    Route::delete('/project/delete/{id}', [ProjectController::class, 'destroy'])->name('backend.project.delete');

    // certificates route
    Route::get('/certificate', [CertificateController::class, 'index'])->name('backend.certificate');
    Route::get('/certificate/create', [CertificateController::class, 'create'])->name('backend.certificate.create');
    Route::post('/certificate/store', [CertificateController::class, 'store'])->name('backend.certificate.store');
    Route::get('/certificate/edit/{id}', [CertificateController::class, 'edit'])->name('backend.certificate.edit');
    Route::put('/certificate/update/{id}', [CertificateController::class, 'update'])->name('backend.certificate.update');
    Route::delete('/certificate/delete/{id}', [CertificateController::class, 'destroy'])->name('backend.certificate.delete');
});

Auth::routes();

Route::get('/logout', function () {
    return redirect()->back();
});

Route::fallback(function () {
    return redirect('pages-error-404.html');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
