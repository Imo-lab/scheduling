<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\kpiController;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::resource('employee', employeeController::class);
Route::get('/employee/{nik}/history',[employeeController::class, 'showHistory'])->name('employee.history');
Route::put('/employee/{nik}/deactivate', [employeeController::class, 'deactivateAgent'])->name('employee.deactivate');

Route::resource('kpi', kpiController::class);
Route::post('kpi', [kpiController::class,'uploadFile'])->name('kpi.uploadFile');
