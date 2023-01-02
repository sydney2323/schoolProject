<?php
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Staff\ResultsController;
use App\Http\Controllers\Staff\ProfileController;
use App\Http\Controllers\Admin\AdminResultsController;
use Illuminate\Support\Facades\Route;
use App\Models\Crud;


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

// login

Route::get('/admin/login/form',[LoginController::class,'showAdminLoginForm']);
Route::get('/staff/login/form',[LoginController::class,'showStaffLoginForm']);
Route::get('/student/login/form',[LoginController::class,'showStudentLoginForm']);

Route::post('/admin/login',[LoginController::class,'adminLogin']);
Route::post('/staff/login',[LoginController::class,'staffLogin']);
Route::post('/student/login',[LoginController::class,'studentLogin']);

Route::get('/',[MainController::class,'home'])->name('home');
// Route::get('/admin',[MainController::class,'index2'])->middleware('auth:admin');;
Route::get('/student',[MainController::class,'student'])->middleware('auth:student');;

//staff
Route::group(['middleware' => ['auth:staff']], function() {

    Route::get('/staff/logout',[LoginController::class,'staffOut']);
    Route::get('/admin/logout',[LoginController::class,'adminOut']);

    Route::get('/staff',[MainController::class,'staff']);
    Route::get('/staff/profile',[ProfileController::class,'staffProfile']);
    Route::post('/staff/profile/edit',[ProfileController::class,'staffProfileEdit']);
    Route::post('/staff/profile/change-password',[ProfileController::class,'staffProfileChangePassword']);

    Route::get('/staff/result',[ResultsController::class,'index']);
    Route::get('/staff/result/create',[ResultsController::class,'create']);
    Route::post('/staff/result/',[ResultsController::class,'store']);
    Route::get('/staff/result/{id}/edit',[ResultsController::class,'edit']);
    Route::put('/staff/result/{id}',[ResultsController::class,'update']);
    Route::delete('/staff/result/{id}',[ResultsController::class,'destroy']);
    
    Route::post('/staff/result/fetch-reg-no',[ResultsController::class,'fetchRegNo']);
    Route::post('/staff/result/export-customized-template',[ResultsController::class,'customizedTemp']);
    Route::post('/staff/result/import',[ResultsController::class,'import']);
    Route::get('/staff/result/export',[ResultsController::class,'export']);

    //Route that only staff with admin previlage can perform
    Route::group(['middleware' => ['can:is_admin']], function() {
      Route::get('/login-as-admin-or-staff',[LoginController::class,'loginAsAdminOrStaff']);
      Route::get('/admin',[MainController::class,'admin']);
      Route::get('/admin/result',[AdminResultsController::class,'index']);
      Route::get('/admin/result/create',[AdminResultsController::class,'create']);
      Route::post('/admin/result/import',[AdminResultsController::class,'import']);
      Route::post('/admin/result/export-customized-template',[AdminResultsController::class,'customizedTemp']);

      Route::post('/admin/result/fetch-reg-and-module',[ResultsController::class,'fetchRegAndModule']);
      Route::put('/admin/result/store-final-exam',[AdminResultsController::class,'storeFinalExam']);

      Route::resource('/admin/student', StudentController::class);
      Route::resource('/admin/academic-year', AcademicYearController::class);
      Route::resource('/admin/staff', StaffController::class);
      Route::resource('/admin/module', ModuleController::class);
      Route::post('/admin/module-assign',[ModuleController::class,'assign']);

      Route::get('/admin/privilege',[StaffController::class,'privilege']);
      Route::put('/admin/privilege-assign',[StaffController::class,'privilegeAssign']);

    });
  });


//admin



// Route::get('/admin/student',[StudentController::class,'index']);
// Route::get('/admin/student/create',[StudentController::class,'create']);
// Route::post('/admin/student',[StudentController::class,'store']);
// Route::get('/admin/student/{id}/edit',[StudentController::class,'edit']);
// Route::put('/admin/student/{id}',[StudentController::class,'update']);
// Route::delete('/admin/student/{id}',[StudentController::class,'destroy']);

// Route::get('/admin/academic-year',[AcademicYearController::class,'index']);
// Route::get('/admin/academic-year/create',[AcademicYearController::class,'create']);
// Route::post('/admin/academic-year',[AcademicYearController::class,'store']);
// Route::get('/admin/academic-year/{id}/edit',[AcademicYearController::class,'edit']);
// Route::put('/admin/academic-year/{id}',[AcademicYearController::class,'update']);
// Route::delete('/admin/academic-year/{id}',[AcademicYearController::class,'destroy']);

// Route::get('/admin/staff',[StaffController::class,'index']);
// Route::get('/admin/staff/create',[StaffController::class,'create']);
// Route::post('/admin/staff',[StaffController::class,'store']);
// Route::get('/admin/staff/{id}/edit',[StaffController::class,'edit']);
// Route::put('/admin/staff/{id}',[StaffController::class,'update']);
// Route::delete('/admin/staff/{id}',[StaffController::class,'destroy']);



// Route::resource('photos', PhotoController::class);
// Route::group(['middleware' => ['auth:admin']], function() {
//     Route::get('/users', [UserController::class, 'users']);
//   });



