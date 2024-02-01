<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/employee-attendance-info', [AttendanceController::class, 'getEmployeeAttendanceInfo']);
Route::post('/upload-attendance', [AttendanceController::class, 'uploadExcel']);
