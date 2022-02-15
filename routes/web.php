<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminhomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
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

Route::get('/login', function () {
    return view('login');
});


/* 
	Admin panel routes
*/
Route::get('/admin-login', function () {
    return view('admin/admin-login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/admin-login');
});

Route::post("/admin-login", [UserController::class,'login']);

Route::get('/admin-dashboard', function () {
    return view('admin/admin-dashboard');
});

/*Route::get('/admin-students', function () {
    return view('admin/admin-students');
});*/
Route::get("/admin-students", [StudentController::class,'index']);
Route::get("/admin-students/{seq_no}", [StudentController::class,'getStudent']);
Route::get("/admin-students/active/{seq_no}", [StudentController::class,'activeStudent']);
Route::post("/admin-students", [StudentController::class,'listStudents']);
Route::post("/admin-students/add", [StudentController::class,'saveStudents']);
Route::delete('admin-students/{seq_no}', [StudentController::class,'deleteStudent']);
/*Route::get("/admin-dashboard", [AdmindashController::class,'index']);*/

Route::get("/admin-staff", [StaffController::class,'index']);
Route::get("/admin-staff/{seq_no}", [StaffController::class,'getStaff']);
Route::get("/admin-staff/active/{seq_no}", [StaffController::class,'activeStaff']);
Route::post("/admin-staff", [StaffController::class,'listStaff']);
Route::post("/admin-staff/add", [StaffController::class,'saveStaff']);
Route::delete('admin-staff/{seq_no}', [StaffController::class,'deleteStaff']);

