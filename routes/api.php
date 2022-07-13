<?php

use App\Http\Controllers\Admin\ChartsController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\CompanyTermsAndAgreementController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\CustomerContactsController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/services',[ServiceController::class,'GetServices'])->name('all.services');
Route::post('/services/insert',[ServiceController::class,'InsertServices'])->name('insert.service');
//charts api routes
Route::get('/charts',[ChartsController::class,'GetChartsData'])->name('get.charts.data');
Route::post('/charts/insert',[ChartsController::class,'InsertChartData'])->name('insert.charts.data');

Route::get('/client-reviews',[ClientReviewController::class,'GetClientReviews'])->name('get.client.reviews');
Route::post('/client-reviews/insert',[ClientReviewController::class,'InsertClientReviews'])->name('insert.client.reviews');

//customer details
Route::get('/customer-messages',[CustomerContactsController::class,'GetMessages']);
Route::post('/customer/messages/insert',[CustomerContactsController::class,'InsertCustomerDetails'])->name('insert.customer.details');

//courses api routes
Route::get('/courses/limit',[CoursesController::class,'GetCoursesLimit'])->name('get.limit.courses');
Route::get('/courses',[CoursesController::class,'GetAllCoursesData'])->name('get.all.courses');
Route::post('/courses/insert',[CoursesController::class,'InsertCourse'])->name('insert.course');
Route::get('/courses/fetch/{id}',[CoursesController::class,'GetSingleCourse'])->name('get.single.course');

//Routes company services
Route::get('/company-data',[CompanyTermsAndAgreementController::class,'GetCompanyTermsandInformation']);
Route::post('/company-data/insert',[CompanyTermsAndAgreementController::class,'InsertCompanyProfile']);

//Project details
Route::get('/project/limit',[ProjectsController::class,'GetProjectsLimit']);
Route::get('/project/all',[ProjectsController::class,'GetAllProjects']);
Route::post('/project/insert',[ProjectsController::class,'InsertProject']);
Route::get('/project-details/{id}',[ProjectsController::class,'GetSelectedProject']);

//Homepage Controller
Route::get('/homepage/data',[HomepageController::class,'GetHomeData']);
Route::post('/homepage/insert',[HomepageController::class,'InsertHomeData']);

//company Profile
Route::get('/company-profile',[CompanyProfileController::class,'GetCompanyProfile']);







