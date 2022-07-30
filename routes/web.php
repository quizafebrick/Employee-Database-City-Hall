<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Employee;
use App\Http\Controllers\SuperAdmin;
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

// ===================================================================================== //
// EMPLOYEE CONTROLLER
Route::get('/', [Employee::class, 'index'])->name('index');
Route::get('/create/', [Employee::class, 'create'])->name('create.add-employee');
Route::post('/save/', [Employee::class, 'store'])->name('store.save-employee');
// SIGNED TOKEN VALIDITY 1 MINUTE
Route::get('/created', [Employee::class, 'codeView'])->name('create.code-employee')->middleware('signedToken');
Route::get('/created_view/{employeeToken}', [Employee::class, 'show'])->name('create.view-employee')->middleware('signedToken');
Route::get('/search/', [Employee::class, 'viewSearch'])->name('search-employee');
Route::post('/searched/', [Employee::class, 'searched'])->name('searched-employee');

// ===================================================================================== //
// ADMIN'S CONTROLLER
Route::post('a/login/check', [Admin::class, 'checkUsers'])->name('admin.check');
Route::get('/view-qr-code-employee/{id}', [Admin::class, 'viewQrCode'])->name('superadmin.view-qrCode')->middleware('signedToken');

// MIDDLEWARE FOR ADMIN; CAN'T GO BACK TO THE LOGIN PAGE AFTER SIGNING IN; CAN'T GO BACK TO HOMEPAGE(FOR ADMIN) AFTER SIGNING OUT
Route::group(['middleware' => ['isAdmin']], function() {
    Route::get('a/login/', [Admin::class, 'loginView'])->name('admin.login');
    Route::get('a/', [Admin::class, 'admin'])->name('admin.index');
    Route::get('a/logout', [Admin::class, 'logout'])->name('admin.logout');
    Route::get('a/qrCode', [Admin::class, 'qrCode'])->name('admin.qrCode');
    Route::get('a/add/', [Admin::class, 'addEmployee'])->name('admin.add-employee');
    Route::post('a/store/', [Admin::class, 'storeEmployee'])->name('admin.save-employee');
    Route::get('a/edit/{linkToken}/{id}', [Admin::class, 'editEmployee'])->name('admin.edit-employee');
    Route::put('a/update/{linkToken}/{id}', [Admin::class, 'update'])->name('admin.update-employee');
});

// ===================================================================================== //
// SUPERADMIN'S CONTROLLER
Route::post('sa/login/check', [SuperAdmin::class, 'checkUsers'])->name('superadmin.check');
Route::get('/scanned-qr-code-employee/', [SuperAdmin::class, 'scanned'])->name('superadmin.scan-qrCode');
// Route::get('/view-qr-code-employee/{employee_no}', [SuperAdmin::class, 'viewQrCode'])->name('superadmin.view-qrCode');

Route::group(['middleware' => ['isSuperAdmin']], function() {
    Route::get('sa/login/', [SuperAdmin::class, 'loginView'])->name('superadmin.login');
    Route::get('sa/', [SuperAdmin::class, 'superadmin'])->name('superadmin.index');
    Route::get('sa/logout', [SuperAdmin::class, 'logout'])->name('superadmin.logout');
    Route::get('sa/add/', [SuperAdmin::class, 'addEmployee'])->name('superadmin.add-employee');
    Route::post('sa/store/', [SuperAdmin::class, 'storeEmployee'])->name('superadmin.save-employee');
    Route::get('sa/edit/{linkToken}/{id}', [SuperAdmin::class, 'editEmployee'])->name('superadmin.edit-employee');
    Route::put('sa/update/{linkToken}/{id}', [Employee::class, 'update'])->name('superadmin.update-employee');
    Route::get('sa/remove/{id}', [Employee::class, 'destroy'])->name('superadmin.remove-employee');
    Route::get('sa/archive', [SuperAdmin::class, 'archive'])->name('superadmin.archive-employee');
    Route::get('sa/restore/{id}', [Employee::class, 'restore'])->name('superadmin.restore-employee');
    Route::get('sa/force_delete/{id}', [Employee::class, 'forceDelete'])->name('superadmin.forceDelete-employee');
    Route::get('sa/scan-qr/', [SuperAdmin::class, 'scanQrCode'])->name('superadmin.view-scan-employee');

});
