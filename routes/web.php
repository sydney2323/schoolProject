<?php
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
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

Route::get('/admin',[AdminPanelController::class,'index']);
Route::get('/admin/login',[AdminPanelController::class,'login']);

Route::get('/student',[StudentController::class,'index']);
Route::get('/student/create',[StudentController::class,'create']);
Route::post('/student',[StudentController::class,'store']);
Route::get('/student/{id}/edit',[StudentController::class,'edit']);
Route::put('/student/{id}',[StudentController::class,'update']);
Route::delete('/student/{id}',[StudentController::class,'destroy']);

Route::get('/staff',[StaffController::class,'index']);
Route::get('/staff/create',[StaffController::class,'create']);
Route::post('/staff',[StaffController::class,'store']);
Route::get('/staff/{id}/edit',[StaffController::class,'edit']);
Route::put('/staff/{id}',[StaffController::class,'update']);
Route::delete('/staff/{id}',[StaffController::class,'destroy']);

Route::get('/module',[ModuleController::class,'index']);
Route::get('/module/create',[ModuleController::class,'create']);
Route::post('/module',[ModuleController::class,'store']);
Route::get('/module/{id}/edit',[ModuleController::class,'edit']);
Route::put('/module/{id}',[ModuleController::class,'update']);
Route::delete('/module/{id}',[ModuleController::class,'destroy']);



