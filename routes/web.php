<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ManufacturerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('client')->group(function () {
    Route::get('/{id}/edit', [ClientController::class, 'edit'])->name('client.edit');
    Route::get('/{id}/delete', [ClientController::class, 'delete'])->name('client.delete');
    Route::post('/{id}/update', [ClientController::class, 'update'])->name('client.update');
    
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::get('/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('/store', [ClientController::class, 'store'])->name('client.store');
});

Route::prefix('employee')->group(function () {
    Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::get('/{id}/delete', [EmployeeController::class, 'delete'])->name('employee.delete');
    Route::post('/{id}/update', [EmployeeController::class, 'update'])->name('employee.update');

    Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
});

Route::prefix('equipment')->group(function () {
    Route::get('/', [EquipmentController::class, 'index'])->name('equipment.index');
    Route::get('/{id}/edit', [EquipmentController::class, 'edit'])->name('equipment.edit');
    Route::get('/{id}/delete', [EquipmentController::class, 'delete'])->name('equipment.delete');
    Route::post('/{id}/update', [EquipmentController::class, 'update'])->name('equipment.update');

    Route::get('/create', [EquipmentController::class, 'create'])->name('equipment.create');
    Route::post('/store', [EquipmentController::class, 'store'])->name('equipment.store');
});

Route::prefix('manufacturer')->group(function () {
    Route::get('/', [ManufacturerController::class, 'index'])->name('manufacturer.index');
    Route::get('/{id}/edit', [ManufacturerController::class, 'edit'])->name('manufacturer.edit');
    Route::get('/{id}/delete', [ManufacturerController::class, 'delete'])->name('manufacturer.delete');
    Route::post('/{id}/update', [ManufacturerController::class, 'update'])->name('manufacturer.update');

    Route::get('/create', [ManufacturerController::class, 'create'])->name('manufacturer.create');
    Route::post('/store', [ManufacturerController::class, 'store'])->name('manufacturer.store');
});