<?php


use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Organization\EmployeeCrudController;
use App\Http\Controllers\Organization\OrganizationProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;

use Illuminate\Support\Facades\Route;

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










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';





//Role here
Route::get('/',[TestController::class,'index'])->middleware(['auth'])->name('home');





//Organization profile here
Route::get('/organization/profile',[OrganizationProfileController::class,'index'])->middleware(['auth','organization'])->name('organizationProfile');
Route::post('/organization/profile',[OrganizationProfileController::class,'store'])->middleware(['auth','organization'])->name('organizationProfile.store');





//Employee added by organization here


Route::get('/employee',[EmployeeCrudController::class,'index'])->middleware(['auth','organization'])->name('employee.index');
Route::post('/employee',[EmployeeCrudController::class,'store'])->middleware(['auth','organization'])->name('employee.store');
