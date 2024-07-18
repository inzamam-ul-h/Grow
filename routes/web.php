<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChaptersController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\empCourseController;
use App\Http\Controllers\admin\EmployeeCrudControllerAdmin;
use App\Http\Controllers\Admin\LectureController;
use App\Http\Controllers\admin\OrganizationCrudController;
use App\Http\Controllers\Admin\OrgCoursesController;
use App\Http\Controllers\Admin\TopicsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Organization\EmployeeCrudController;
use App\Http\Controllers\Organization\OrganizationProfileController;
use App\Http\Controllers\OrganizationCrudController as ControllersOrganizationCrudController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
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


// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth','profile.complete','check.status');

Route::get('/home', [DashboardController::class, 'showDashboard'])->middleware(['auth', 'profile.complete', 'check.status'])->name('home');
// Route::get('/',function(){
//     return view('home');
// })->middleware(['auth','profile.complete','check.status'])->name('home');


Route::get('/', [DashboardController::class, 'showDashboard'])->middleware(['auth', 'profile.complete', 'check.status'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';




//Organization profile here
Route::get('/organization/profile', [OrganizationProfileController::class, 'create'])->middleware(['auth', 'organization'])->name('organizationProfile');
Route::post('/organization/profile', [OrganizationProfileController::class, 'store'])->middleware(['auth', 'organization'])->name('organizationProfile.store');

//create User Employee
Route::middleware(['auth', 'profile.complete'])->prefix('user')->group(function () {


     Route::get('/trash', [UserController::class, 'trash'])->name('user.trash');
     Route::get('/{id}/restore', [UserController::class, 'restore'])->name('user.restore');
   // Route::delete('/{id}/force-delete', [UserController::class, 'forceDelete'])->name('user.delete');
    Route::get('/softDelete/{id}', [UserController::class, 'destroy'])->name('user.destroy');




    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/data', [UserController::class, 'getEmployeeData'])->name('user.data');


    //status
    Route::get('/toggle-status/{id}', [UserController::class, 'toggleStatus'])->middleware(['organization'])->name('user.toggleStatus');
});


//create organization by admin
Route::middleware(['auth', 'admin',])->prefix('organization')->group(function () {

     //soft delete and recover organization data
     Route::get('/trash', [ControllersOrganizationCrudController::class, 'trash'])->name('organization.trash');
     Route::get('/{id}/restore', [ControllersOrganizationCrudController::class, 'restore'])->name('organization.restore');
     Route::get('/softDelete/{id}', [ControllersOrganizationCrudController::class, 'destroy'])->name('organization.destroy');

    Route::get('/', [ControllersOrganizationCrudController::class, 'index'])->name('organization.index');
    Route::post('/', [ControllersOrganizationCrudController::class, 'store'])->name('organization.store');
    Route::get('/create', [ControllersOrganizationCrudController::class, 'create'])->name('organization.create');
    Route::get('/{id}/edit', [ControllersOrganizationCrudController::class, 'edit'])->name('organization.edit');
    Route::get('/{id}', [ControllersOrganizationCrudController::class, 'show'])->name('organization.show');
    Route::put('/{id}', [ControllersOrganizationCrudController::class, 'update'])->name('organization.update');

    //status
    Route::get('/toggle-status/{id}', [ControllersOrganizationCrudController::class, 'toggleStatus'])->name('organization.toggleStatus');
});



Route::middleware(['auth', 'admin',])->prefix('category')->group(function () {

    Route::get('/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::post('/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    Route::delete('/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
    Route::get('/trash/{id}', [CategoryController::class, 'moveToTrash'])->name('category.moveToTrash');


    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');

    //status
    Route::get('/toggle-status/{id}', [CategoryController::class, 'toggleStatus'])->name('category.toggleStatus');
});




Route::middleware(['auth'])->prefix('course')->group(function () {




    Route::get('/', [CoursesController::class, 'index'])->name('course.index')->middleware('admin');
    Route::get('/create', [CoursesController::class, 'create'])->name('course.create')->middleware('admin');
    Route::post('/create', [CoursesController::class, 'store'])->name('course.store')->middleware('admin');
    Route::get('/{id}', [CoursesController::class, 'show'])->middleware('admin_or_organization')->name('course.show');
    Route::get('/edit/{id}', [CoursesController::class, 'edit'])->name('course.edit')->middleware('admin');
    Route::put('/update/{id}', [CoursesController::class, 'update'])->name('course.update')->middleware('admin');

    //status
    Route::get('/toggle-status/{id}', [CoursesController::class, 'toggleStatus'])->name('course.toggleStatus')->middleware('admin');
});



Route::middleware(['auth'])->prefix('chapter')->group(function () {
    Route::put('/update/{id}/course/{cid}', [ChaptersController::class, 'update'])->name('chapter.update')->middleware('admin');

    Route::get('/course/{id}', [ChaptersController::class, 'index'])->name('chapter.index')->middleware('admin');
    Route::get('/create/{id}', [ChaptersController::class, 'create'])->name('chapter.create')->middleware('admin');
    Route::post('/create/{id}', [ChaptersController::class, 'store'])->name('chapter.store')->middleware('admin');
    Route::get('/{id}/course/{cid}', [ChaptersController::class, 'show'])->name('chapter.show')->middleware('admin_or_organization');
    Route::get('/edit/{id}/course/{cid}', [ChaptersController::class, 'edit'])->name('chapter.edit')->middleware('admin');
    //status
    Route::get('/toggle-status/{id}', [ChaptersController::class, 'toggleStatus'])->name('chapter.toggleStatus')->middleware('admin');
});




Route::middleware(['auth'])->prefix('topic')->group(function () {


    // Route::get('/chapter/{id}', [TopicsController::class, 'index'])->name('topic.index');
    Route::get('/create/chapter/{id}', [TopicsController::class, 'create'])->name('topic.create')->middleware('admin');
    Route::post('/create/chapter/{id}', [TopicsController::class, 'store'])->name('topic.store')->middleware('admin');
    Route::get('/{id}/chapter/{chid}', [TopicsController::class, 'show'])->name('topic.show')->middleware('admin_or_organization');
    Route::get('/edit/{id}/chapter/{chid}', [TopicsController::class, 'edit'])->name('topic.edit')->middleware('admin');
    Route::put('/update/{id}/chapter/{chid}', [TopicsController::class, 'update'])->name('topic.update')->middleware('admin');
    //status
    Route::get('/toggle-status/{id}', [TopicsController::class, 'toggleStatus'])->name('topic.toggleStatus')->middleware('admin');
});




Route::middleware(['auth', 'admin_or_organization',])->prefix('lecture')->group(function () {
    Route::get('/create/topic/{id}', [LectureController::class, 'create'])->name('lecture.create')->middleware('admin');
    Route::post('/create/topic/{id}', [LectureController::class, 'store'])->name('lecture.store')->middleware('admin');
    Route::get('/{id}/topic/{tid}', [LectureController::class, 'show'])->name('lecture.show');
    Route::get('/edit/{id}/topic/{tid}', [LectureController::class, 'edit'])->name('lecture.edit')->middleware('admin');
    Route::put('/update/{id}/topic/{tid}', [LectureController::class, 'update'])->name('lecture.update')->middleware('admin');
    //status
    Route::get('/toggle-status/{id}', [LectureController::class, 'toggleStatus'])->name('lecture.toggleStatus')->middleware('admin');
});





Route::middleware(['auth', 'admin_or_organization',])->prefix('orgCourses')->group(function () {
    Route::get('/{id}', [OrgCoursesController::class, 'index'])->name('orgCourse.index');
    Route::post('/assign/{id}', [OrgCoursesController::class, 'store'])->name('orgCourse.store');
    Route::get('/{id}/assign/{orgCid}', [OrgCoursesController::class, 'show'])->name('orgCourse.show');

});



Route::middleware(['auth'])->prefix('empCourses')->group(function () {
    Route::get('/{id}', [empCourseController::class, 'index'])->name('empCourse.index');
    Route::post('/assign/{id}', [empCourseController::class, 'store'])->name('empCourse.store');
    Route::get('/{id}/assign/{orgCid}', [empCourseController::class, 'show'])->name('empCourse.show');

});
