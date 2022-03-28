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
use App\Http\Controllers\LecturesController;
use App\Http\Controllers\InternshipsController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\PresssController;

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
Route::get('/faculty-hub', function () {
    return view('team-faculty');
});
Route::get('/faculty-fellowship-program', function () {
    return view('team-fellowship');
});

// Route::get('/tender-invitations', function () {
//     return view('tender');
// });
Route::get("/tender-invitations", [TendersController::class,'indexTenders']);

Route::get('/archives-tender', function () {
    return view('tender-archives');
});

Route::get('/staff-details', function () {
    return view('team-executive');
});
Route::get('/skill-development-programs-workshops',[SkillsController::class,'indexSkills']);

Route::get('/industry-lecture-series',[LecturesController::class,'indexLectures'] );

Route::get('/entrepreneurship-2', function () {
    return view('entrepreneurship');
});

Route::get('/call-for-expression-of-interest', function () {
    return view('call-for-expression-of-interest');
});

Route::get('/skill-development-proposal', function () {
    return view('skill-development-proposal');
});
// Route::get('/internship', function () {
//     return view('internship');
// });

Route::get("/internship", [InternshipsController::class,'indexInternships']);

Route::get('/careers',[JobsController::class,'indexJobs'] );

Route::get('/press-releases', function () {
    return view('new-press-release');
});
Route::get('/events', function () {
    return view('events');
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

Route::get("/admin-lecture", [LecturesController::class,'index']);
Route::get("/admin-lecture/{seq_no}", [LecturesController::class,'getLecture']);
Route::post("/admin-lecture", [LecturesController::class,'listLecture']);
Route::post("/admin-lecture/add", [LecturesController::class,'saveLecture']);
Route::delete('admin-lecture/{seq_no}', [LecturesController::class,'deleteLecture']);

Route::get("/admin-internship", [InternshipsController::class,'index']);
Route::get("/admin-internship/{seq_no}", [InternshipsController::class,'getInternship']);
Route::post("/admin-internship", [InternshipsController::class,'listInternship']);
Route::post("/admin-internship/add", [InternshipsController::class,'saveInternship']);
Route::delete('admin-internship/{seq_no}', [InternshipsController::class,'deleteInternship']);

Route::get("/admin-job", [JobsController::class,'index']);
Route::get("/admin-job/{seq_no}", [JobsController::class,'getJob']);
Route::post("/admin-job", [JobsController::class,'listJob']);
Route::post("/admin-job/add", [JobsController::class,'saveJob']);
Route::delete('admin-job/{seq_no}', [JobsController::class,'deleteJob']);

Route::get("/admin-press", [PresssController::class,'index']);
Route::get("/admin-press/{seq_no}", [PresssController::class,'getPress']);
Route::post("/admin-press", [PresssController::class,'listPress']);
Route::post("/admin-press/add", [PresssController::class,'savePress']);
Route::delete('admin-press/{seq_no}', [PresssController::class,'deletePress']);

