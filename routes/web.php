<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HODController;
use App\Http\Controllers\admin\HOFController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\admin\ModuleController;
use App\Http\Controllers\admin\SchoolController;
use App\Http\Controllers\admin\CollegeController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\StaffroleController;
use App\Http\Controllers\admin\DepartementController;
use App\Http\Controllers\admin\DestinationController;
use App\Http\Controllers\finace\FinaceController;
use App\Http\Controllers\lecturer\LecturerController;
use App\Http\Controllers\hod\HeadOfDepartementController;

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
})->name('home');


Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // colleges Admin
    Route::get('admin/colleges', [CollegeController::class, 'index'])->name('admin.colleges');
    Route::post('admin/colleges/create', [CollegeController::class, 'create'])->name('admin.colleges.create');
    Route::post('admin/colleges/changeStatus', [CollegeController::class, 'changeStatus'])->name('admin.colleges.status.change');
    Route::get('admin/colleges/show/{id}', [CollegeController::class, 'show'])->name('admin.colleges.show');
    Route::post('admin/colleges/update', [CollegeController::class, 'update'])->name('admin.colleges.update');
    Route::get('admin/colleges/generalList', [CollegeController::class, 'generalList'])->name('admin.colleges.generalList');

    // schools Admin
    Route::get('admin/schools', [SchoolController::class, 'index'])->name('admin.schools');
    Route::post('admin/schools/create', [SchoolController::class, 'create'])->name('admin.schools.create');
    Route::post('admin/schools/changeStatus', [SchoolController::class, 'changeStatus'])->name('admin.schools.status.change');
    Route::get('admin/schools/show/{id}', [SchoolController::class, 'show'])->name('admin.schools.show');
    Route::post('admin/schools/update', [SchoolController::class, 'update'])->name('admin.schools.update');
    Route::get('admin/schools/generalList', [SchoolController::class, 'generalList'])->name('admin.schools.generalList');

    // Departement Admin
    Route::get('admin/departements', [DepartementController::class, 'index'])->name('admin.departements');
    Route::post('admin/departements/create', [DepartementController::class, 'create'])->name('admin.departements.create');
    Route::post('admin/departements/changeStatus', [DepartementController::class, 'changeStatus'])->name('admin.departements.status.change');
    Route::get('admin/departements/show/{id}', [DepartementController::class, 'show'])->name('admin.departements.show');
    Route::post('admin/departements/update', [DepartementController::class, 'update'])->name('admin.departements.update');
    Route::get('admin/departements/generalList', [DepartementController::class, 'generalList'])->name('admin.departements.generalList');

    // dependent drop down Admin
    Route::post('admin/school_college', [DepartementController::class, 'SchoolCollege'])->name('admin.departement.school_college');

    // user Roles Admin

    // Route::get('admin/staff/role', [StaffroleController::class, 'index'])->name('admin.staff.role');
    // Route::post('admin/staff/role/create', [StaffroleController::class, 'create'])->name('admin.staff.role.create');
    // Route::post('admin/staff/role/changeStatus', [StaffroleController::class, 'changeStatus'])->name('admin.staff.role.status.change');
    // Route::get('admin/staff/role/show/{id}', [StaffroleController::class, 'show'])->name('admin.staff.role.show');
    // Route::post('admin/staff/role/update', [StaffroleController::class, 'update'])->name('admin.staff.role.update');
    // Route::get('admin/staff/role/generalList', [StaffroleController::class, 'generalList'])->name('admin.staff.role.generalList');



    // Staff Admn
    Route::get('admin/staffs', [StaffController::class, 'index'])->name('admin.staffs');
    Route::post('admin/staffs/create', [StaffController::class, 'create'])->name('admin.staffs.create');
    Route::post('admin/staffs/changeStatus', [StaffController::class, 'changeStatus'])->name('admin.staffs.status.change');
    Route::get('admin/staffs/show/{id}', [StaffController::class, 'show'])->name('admin.staffs.show');
    Route::post('admin/staffs/update', [StaffController::class, 'update'])->name('admin.staffs.update');
    Route::get('admin/staffs/generalList', [StaffController::class, 'generalList'])->name('admin.staffs.generalList');


    // Staff hod
    Route::get('hod/staffs', [StaffController::class, 'index'])->name('hod.staffs');
    Route::post('hod/staffs/create', [StaffController::class, 'create'])->name('hod.staffs.create');
    Route::post('hod/staffs/changeStatus', [StaffController::class, 'changeStatus'])->name('hod.staffs.status.change');
    Route::get('hod/staffs/show/{id}', [StaffController::class, 'show'])->name('hod.staffs.show');
    Route::post('hod/staffs/update', [StaffController::class, 'update'])->name('hod.staffs.update');
    Route::get('hod/staffs/generalList', [StaffController::class, 'generalList'])->name('hod.staffs.generalList');
    
    // Hod Admn
    Route::get('admin/hod', [HODController::class, 'index'])->name('admin.hod');
    Route::post('admin/hod/create', [HODController::class, 'create'])->name('admin.hod.create');
    Route::post('admin/hod/changeStatus', [HODController::class, 'changeStatus'])->name('admin.hod.status.change');
    Route::get('admin/hod/show/{id}', [HODController::class, 'show'])->name('admin.hod.show');
    Route::post('admin/hod/update', [HODController::class, 'update'])->name('admin.hod.update');
    Route::get('admin/hod/generalList', [HODController::class, 'generalList'])->name('admin.hod.generalList');

    // HOFinace Admn
    Route::get('admin/hof', [HOFController::class, 'index'])->name('admin.hof');
    Route::post('admin/hof/create', [HOFController::class, 'create'])->name('admin.hof.create');
    Route::post('admin/hof/changeStatus', [HOFController::class, 'changeStatus'])->name('admin.hof.status.change');
    Route::get('admin/hof/show/{id}', [HOFController::class, 'show'])->name('admin.hof.show');
    Route::post('admin/hof/update', [HOFController::class, 'update'])->name('admin.hof.update');
    Route::get('admin/hof/generalList', [HOFController::class, 'generalList'])->name('admin.hof.generalList');

    // Student Admn
    Route::get('admin/students', [StudentController::class, 'index'])->name('admin.students');
    Route::post('admin/students/create', [StudentController::class, 'create'])->name('admin.students.create');
    Route::post('admin/students/changeStatus', [StudentController::class, 'changeStatus'])->name('admin.students.status.change');
    Route::get('admin/students/show/{id}', [StudentController::class, 'show'])->name('admin.students.show');
    Route::post('admin/students/update', [StudentController::class, 'update'])->name('admin.students.update');
    Route::get('admin/students/generalList', [StudentController::class, 'generalList'])->name('admin.students.generalList');


    // student hod
    Route::get('hod/students', [StudentController::class, 'index'])->name('hod.students');
    Route::post('hod/students/create', [StudentController::class, 'create'])->name('hod.students.create');
    Route::post('hod/students/changeStatus', [StudentController::class, 'changeStatus'])->name('hod.students.status.change');
    Route::get('hod/students/defendStatus/{id}', [StudentController::class, 'defendStatus'])->name('hod.students.defend.change');
    Route::get('hod/students/show/{id}', [StudentController::class, 'show'])->name('hod.students.show');
    Route::post('hod/students/update', [StudentController::class, 'update'])->name('hod.students.update');
    Route::get('hod/students/generalList', [StudentController::class, 'generalList'])->name('hod.students.generalList');

    // module Admn
    Route::get('admin/modules', [ModuleController::class, 'index'])->name('admin.modules');
    Route::post('admin/modules/create', [ModuleController::class, 'create'])->name('admin.modules.create');
    Route::post('admin/modules/changeStatus', [ModuleController::class, 'changeStatus'])->name('admin.modules.status.change');
    Route::get('admin/modules/show/{id}', [ModuleController::class, 'show'])->name('admin.modules.show');
    Route::post('admin/modules/update', [ModuleController::class, 'update'])->name('admin.modules.update');
    Route::get('admin/modules/generalList', [ModuleController::class, 'generalList'])->name('admin.modules.generalList');


    // module Hod
    Route::get('hod/modules', [ModuleController::class, 'index'])->name('hod.modules');
    Route::post('hod/modules/create', [ModuleController::class, 'create'])->name('hod.modules.create');
    Route::post('hod/modules/changeStatus', [ModuleController::class, 'changeStatus'])->name('hod.modules.status.change');
    Route::get('hod/modules/show/{id}', [ModuleController::class, 'show'])->name('hod.modules.show');
    Route::post('hod/modules/update', [ModuleController::class, 'update'])->name('hod.modules.update');
    Route::get('hod/modules/generalList', [ModuleController::class, 'generalList'])->name('hod.modules.generalList');
   


        // User
    Route::get('student/dashboard', [FrontController::class, 'index'])->name('user.dashboard');
    Route::get('student/request-form', [FrontController::class, 'requestForm'])->name('user.requestForm');
    Route::post('student/request/create', [FrontController::class, 'createRequest'])->name('user.request.create');
    Route::get('student/All-Requests/', [FrontController::class, 'allRequests'])->name('user.allRequests');
    Route::get('student/staff-requests', [FrontController::class, 'allStaffRequests'])->name('user.allstaffRequests');
    Route::get('student/request/Details', [FrontController::class, 'Request'])->name('user.request.Details');
    Route::POST('student/requestDetails', [FrontController::class, 'RequestDetails'])->name('user.requestDetails');

    Route::get('student/edit/account', [FrontController::class, 'Account'])->name('user.account');
    Route::POST('student/update/account', [FrontController::class, 'updateAccount'])->name('user.update.acount');
    Route::get('student/staffprofile/details', [FrontController::class, 'staffProfileData'])->name('user.profile.details');

    Route::get('student/edit/password', [FrontController::class, 'editPassword'])->name('user.editPassword');
    Route::POST('student/update/password', [FrontController::class, 'updatePssword'])->name('user.update.password');

    // payment user and transcript and other docs
    Route::POST('student/pay', [FrontController::class, 'momoPaymentOrder'])->name('user.pay');
    Route::POST('student/pay/callback', [FrontController::class, 'momoCallback'])->name('user.pay.callback');
    Route::GET('student/transcript', [FrontController::class, 'transcript'])->name('user.transcript');
    Route::GET('student/transcript/exportPdf', [FrontController::class, 'exportPdf'])->name('user.transcript.exportPdf');

    Route::GET('student/document/toWhom', [FrontController::class, 'toWhom'])->name('user.toWhom');
    Route::GET('student/toWhom/download', [FrontController::class, 'toWhomDownload'])->name('user.toWhom.export');

    // testimonial 

    Route::GET('student/document/testimonial', [FrontController::class, 'testimonial'])->name('user.testimonial');
    Route::GET('student/testimonial/download', [FrontController::class, 'testimonialDownload'])->name('user.testimonial.export');

    
    // lecture
    // Route::get('lecturer/dashboard', [FrontController::class, 'indexLecturer'])->name('lecturer.dashboard');
    // Route::get('lecturer/marks', [FrontController::class, 'studentMarks'])->name('user.lecturer.marks');
    // Route::get('lecturer/add/marks', [FrontController::class, 'addMarks'])->name('user.add.marks');
    // Route::POST('lecturer/create/marks', [FrontController::class, 'createMarks'])->name('user.create.marks');

    // lecture

    Route::get('lecturer/dashboard', [LecturerController::class, 'index'])->name('lecturer.dashboard');
    Route::get('lecturer/profile', [LecturerController::class, 'Account'])->name('lecturer.account');

    Route::get('lecturer/module/{code}/{id}', [LecturerController::class, 'moduleMarks'])->name('user.lecturer.marks');
    Route::POST('lecturer/create/marks',[LecturerController::class, 'createMarks'])->name('lecturer.create.marks');
    Route::POST('lecturer/update/marks',[LecturerController::class, 'updateMarks'])->name('lecturer.update.marks');
    
    
    // Head of Departement
    Route::get('hod/dashboard', [HeadOfDepartementController::class, 'index'])->name('hod.dashboard');
    //  Head of finace
    Route::get('finace/dashboard', [FinaceController::class, 'index'])->name('hof.dashboard');
    Route::get('finace/transcript/request', [FinaceController::class, 'transcriptRequest'])->name('hof.transcript.requests');
    Route::get('/finace/students', [FinaceController::class, 'student'])->name('hof.students');
    Route::get('/finace/students/generalList/', [FinaceController::class, 'studentList'])->name('hof.students.generalList');
    Route::get('/finace/students/{id}', [FinaceController::class, 'studentShow'])->name('hof.students.show');
    Route::get('/finace/request/generalList/', [FinaceController::class, 'TranscriptRequestList'])->name('hof.request.generalList');
    Route::post('finace/student/clear/', [FinaceController::class, 'toogleClearFinace'])->name('hof.student.clear');
    
    Route::get('hod/all/request', [HeadOfDepartementController::class, 'allRequests'])->name('hod.allRequest');
    Route::get('hod/allrequestList', [HeadOfDepartementController::class, 'allrequestList'])->name('hod.allrequestList');
    Route::get('hod/pending/request', [HeadOfDepartementController::class, 'pendingRequests'])->name('hod.pendingRequest');
    Route::get('hod/pendingRequestList', [HeadOfDepartementController::class, 'PendingRequestList'])->name('hod.pendingRequestList');
    Route::get('hod/approved/request', [HeadOfDepartementController::class, 'approvedRequest'])->name('hod.approvedRequest');
    Route::get('hod/approvedRquestList', [HeadOfDepartementController::class, 'approvedRequestList'])->name('hod.approvedRequestList');

    Route::get('hod/Notapproved/request', [HeadOfDepartementController::class, 'notApprovedRequest'])->name('hod.NotApprovedRequest');
    Route::get('hod/NotapprovedRquestList', [HeadOfDepartementController::class, 'notApprovedRequestList'])->name('hod.notApprovedRequestList');

    Route::post('hod/requestSansation',  [HeadOfDepartementController::class, 'requestSansation'])->name('hod.requestSansation');
    Route::POST('hod/requestDetails', [HeadOfDepartementController::class, 'UserRequestDetails'])->name('hod.UserRequestDetails');

    // account
    Route::get('hod/edit/account', [HeadOfDepartementController::class, 'Account'])->name('hod.account');
    Route::POST('hod/update/account', [HeadOfDepartementController::class, 'updateAccount'])->name('hod.update.acount');
    Route::get('hod/staffprofile/details', [HeadOfDepartementController::class, 'staffProfileData'])->name('hod.profile.details');

});


require __DIR__.'/auth.php';
