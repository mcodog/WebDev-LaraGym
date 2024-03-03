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
    Route::get('/{id}/edit', [ClientController::class, 'edit'])->name('puta');
    Route::get('/{id}/delete', [ClientController::class, 'delete'])->name('client.delete');
    
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::get('/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('/store', [ClientController::class, 'store'])->name('client.store');
    
    // Route::get('/{id}/edit', [AlbumController::class, 'edit'])->name('album.edit');
});

Route::prefix('employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
});

Route::prefix('equipment')->group(function () {
    Route::get('/', [EquipmentController::class, 'index'])->name('equipment.index');
});

Route::prefix('manufacturer')->group(function () {
    Route::get('/', [ManufacturerController::class, 'index'])->name('manufacturer.index');
});