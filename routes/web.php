<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;

use App\Models\Service;
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
    return view('home');
})->name('client.home')->middleware('auth');


Route::prefix('client')->group(function () {
    Route::get('/{id}/edit', [ClientController::class, 'edit'])->name('client.edit')->middleware('auth');
    Route::get('/{id}/delete', [ClientController::class, 'delete'])->name('client.delete')->middleware('auth');
    Route::post('/{id}/update', [ClientController::class, 'update'])->name('client.update')->middleware('auth');
    
    Route::get('/', [ClientController::class, 'index'])->name('client.index')->middleware('auth');
    Route::get('/create', [ClientController::class, 'create'])->name('client.create')->middleware('auth');
    Route::post('/store', [ClientController::class, 'store'])->name('client.store')->middleware('auth');
});

Route::prefix('employee')->group(function () {
    Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit')->middleware('auth');
    Route::get('/{id}/delete', [EmployeeController::class, 'delete'])->name('employee.delete')->middleware('auth');
    Route::post('/{id}/update', [EmployeeController::class, 'update'])->name('employee.update')->middleware('auth');

    Route::get('/', [EmployeeController::class, 'index'])->name('employee.index')->middleware('auth');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create')->middleware('auth');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store')->middleware('auth');
});

Route::prefix('equipment')->group(function () {
    Route::get('/', [EquipmentController::class, 'index'])->name('equipment.index')->middleware('auth');
    Route::get('/{id}/edit', [EquipmentController::class, 'edit'])->name('equipment.edit')->middleware('auth');
    Route::get('/{id}/delete', [EquipmentController::class, 'delete'])->name('equipment.delete')->middleware('auth');
    Route::post('/{id}/update', [EquipmentController::class, 'update'])->name('equipment.update')->middleware('auth');

    Route::get('/create', [EquipmentController::class, 'create'])->name('equipment.create')->middleware('auth');
    Route::post('/store', [EquipmentController::class, 'store'])->name('equipment.store')->middleware('auth');
});

Route::prefix('manufacturer')->group(function () {
    Route::get('/', [ManufacturerController::class, 'index'])->name('manufacturer.index')->middleware('auth');
    Route::get('/{id}/edit', [ManufacturerController::class, 'edit'])->name('manufacturer.edit')->middleware('auth');
    Route::get('/{id}/delete', [ManufacturerController::class, 'delete'])->name('manufacturer.delete')->middleware('auth');
    Route::post('/{id}/update', [ManufacturerController::class, 'update'])->name('manufacturer.update')->middleware('auth');

    Route::get('/create', [ManufacturerController::class, 'create'])->name('manufacturer.create')->middleware('auth');
    Route::post('/store', [ManufacturerController::class, 'store'])->name('manufacturer.store')->middleware('auth');
});

Route::get('/coaching', [TransactionController::class, 'indexCoaching'])->name('coaching.index');
Route::get('/program/{id}/details', [TransactionController::class, 'showDetails'])->name('coaching.details');
Route::post('/search', [TransactionController::class, 'searchResult'])->name('search.result');
Route::get('/trainwithus', [TransactionController::class, 'trainwithus'])->name('train.withus');
Route::post('/Store', [TransactionController::class, 'store'])->name('train.store');
Route::get('/profile', [TransactionController::class, 'getProfile'])->name('get.profile');
Route::post('{id}/save-profile', [TransactionController::class, 'saveProfile'])->name('save.profile');

Route::get('/analytics', [AdminController::class, 'index'])->name('analytics')->middleware('auth');
Route::get('/analytics/{id}/edit', [AdminController::class, 'edit'])->name('analytics-edit')->middleware('auth');
Route::post('/analytics/{id}/update', [AdminController::class, 'update'])->name('analytics-update')->middleware('auth');
Route::get('/analytics/{id}/delete', [AdminController::class, 'delete'])->name('analytics-delete')->middleware('auth');

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('sendbasicemail',[MailController::class, 'basic_email']);
Route::post('review/store',[ReviewController::class, 'store'])->middleware('auth');



// Route::post('search', function(Request $request) {
//     $service = App\Models\Service::search($request->queryyy)->get();

//     return $service;
// });
