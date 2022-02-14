<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminhomeController;
use App\Http\Controllers\StudentController;
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
Route::post("/admin-login", [UserController::class,'login']);

Route::get('/admin-dashboard', function () {
    return view('admin/admin-dashboard');
});

/*Route::get('/admin-students', function () {
    return view('admin/admin-students');
});*/
Route::get("/admin-students", [StudentController::class,'index']);
Route::get("/admin-students/{seq_no}", [StudentController::class,'getStudent']);
Route::post("/admin-students", [StudentController::class,'listStudents']);
Route::post("/admin-students/add", [StudentController::class,'saveStudents']);
Route::delete('admin-students/{seq_no}', [StudentController::class,'deleteStudent']);
/*Route::get("/admin-dashboard", [AdmindashController::class,'index']);*/

