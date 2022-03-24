<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminhomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\TendersController;
use App\Http\Controllers\SkillsController;
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
Route::get('/Tihan-Foundation', function () {
    return view('About-us-Foundation');
});
Route::get('/industry', function () {
    return view('R&D-Industry');
});

Route::get('/academia', function () {
    return view('R&D-Acadamic');
});

Route::get('/members-of-the-hub-governing-board', function () {
    return view('team-hub');
});
Route::get('/student-details', [StudentController::class,'studentDetails']);

Route::get("/office_forms", [FormsController::class,'indexForms']);
Route::get('/testbed', function () {
    return view('testbed');
});
Route::get('/foundation_stone', function () {
    return view('foundation_stone');
});

Route::get('/donate', function () {
    return view('Donate');
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

Route::get("/admin-interns", [InternController::class,'index']);
Route::get("/admin-interns/{seq_no}", [InternController::class,'getIntern']);
Route::get("/admin-interns/active/{seq_no}", [InternController::class,'activeIntern']);
Route::post("/admin-interns", [InternController::class,'listInterns']);
Route::post("/admin-interns/add", [InternController::class,'saveInterns']);
Route::delete('admin-interns/{seq_no}', [InternController::class,'deleteIntern']);

Route::get("/admin-consultant", [StaffController::class,'indexConsultant']);
Route::get("/admin-researcher", [StaffController::class,'indexResearcher']);

Route::get("/admin-pdfs", [PdfController::class,'index']);
Route::get("/admin-pdfs/{seq_no}", [PdfController::class,'getPdf']);
Route::get("/admin-pdfs/active/{seq_no}", [PdfController::class,'activePdf']);
Route::post("/admin-pdfs", [PdfController::class,'listPdfs']);
Route::post("/admin-pdfs/add", [PdfController::class,'savePdfs']);
Route::delete('admin-pdfs/{seq_no}', [PdfController::class,'deletePdf']);

Route::get("/admin-assets", [AssetsController::class,'index']);
Route::get("/admin-assets/{seq_no}", [AssetsController::class,'getAsset']);
Route::get("/admin-assets/active/{seq_no}", [AssetsController::class,'activeAsset']);
Route::post("/admin-assets", [AssetsController::class,'listAssets']);
Route::post("/admin-assets/add", [AssetsController::class,'saveAssets']);
Route::delete('admin-assets/{seq_no}', [AssetsController::class,'deleteAsset']);

Route::get("/admin-forms", [FormsController::class,'index']);
Route::post("/admin-forms", [FormsController::class,'listForms']);
Route::post("/admin-forms/add", [FormsController::class,'saveForms']);
Route::delete('admin-forms/{seq_no}', [FormsController::class,'deleteform']);

Route::get("/admin-tender", [TendersController::class,'index']);
Route::get("/admin-tender/{seq_no}", [TendersController::class,'getTender']);
Route::post("/admin-tender", [TendersController::class,'listTender']);
Route::post("/admin-tender/add", [TendersController::class,'saveTender']);
Route::delete('admin-tender/{seq_no}', [TendersController::class,'deleteTender']);

Route::get("/admin-skill", [SkillsController::class,'index']);
Route::get("/admin-skill/{seq_no}", [SkillsController::class,'getSkill']);
Route::post("/admin-skill", [SkillsController::class,'listSkill']);
Route::post("/admin-skill/add", [SkillsController::class,'saveSkill']);
Route::delete('admin-skill/{seq_no}', [SkillsController::class,'deleteSkill']);

