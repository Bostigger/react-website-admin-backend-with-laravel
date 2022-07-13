<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyTermsAndAgreementController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware'=>'auth'],function(){

    Route::get('/logout', [AdminController::class, 'LogOut'])->name('admin.logout');
    Route::get('/update-profile', [AdminController::class, 'UpdateProfilePage'])->name('update.profile.page');
    Route::post('/admin-profile/update', [AdminController::class, 'UpdateProfile'])->name('update.admin.profile');
    Route::get('/admin-password', [AdminController::class, 'changePasswordPage'])->name('change.password.page');

    Route::post('/update-password', [AdminController::class, 'updatePassword'])->name('update.password');
    Route::post('/update-profile', [AdminController::class, 'UpdateProfilePhoto'])->name('update.profile.picture');

//services route
    Route::get('/services', [ServiceController::class, 'ViewServicesPage'])->name('view.services');
    Route::get('/services/edit/{id}', [ServiceController::class, 'EditServicesPage']);
    Route::get('/services/add-page', [ServiceController::class, 'AddServicesPage'])->name('add.services.page');
    Route::post('/services/insert', [ServiceController::class, 'InsertNewService'])->name('add.service');
    Route::post('/services/update/{id}', [ServiceController::class, 'UpdateService']);
    Route::get('/services/delete/{id}', [ServiceController::class, 'DeleteService']);

//Courses
    Route::get('/view-courses', [CoursesController::class, 'ViewCoursesPage'])->name('view.courses');
    Route::get('/add-courses', [CoursesController::class, 'AddCoursesPage'])->name('add.courses.page');
    Route::post('/add-courses/insert', [CoursesController::class, 'AddCourses'])->name('add.course');
    Route::get('/course/edit/{id}', [CoursesController::class, 'EditCoursePage']);
    Route::post('/course/update/{id}', [CoursesController::class, 'UpdateCourse']);
    Route::get('/course/delete/{id}', [CoursesController::class, 'DeleteCourse']);
});
require __DIR__.'/auth.php';
