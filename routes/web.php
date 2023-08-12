<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\CseInstructorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IstInstructorController;
use App\Http\Controllers\AddCseStaffController;
use App\Http\Controllers\AddIstStaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\eteController;
use App\Http\Controllers\HodCseController;
use App\Http\Controllers\HodIstController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ViewStaff;
use App\Http\Controllers\ViewMaterialsController;
use App\Http\Controllers\ViewCseMaterialsController;
use App\Http\Controllers\ViewStaffCSE;
use App\Http\Controllers\ViewStaffIST;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models;
use App\Models\Course;
use App\Models\Department;
use App\Models\Instructors;

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

})->middleware('guest');

Route::get('view_materials',[ViewMaterialsController::class, 'index'])->middleware('auth');
Route::get('view_materials/{id}',[ViewMaterialsController::class, 'deletematerials'])->middleware('auth')->name('deletematerial');

Route::get('view_cse_materials',[ViewCseMaterialsController::class, 'index'])->middleware('auth');
Route::get('view_cse_materials/{id}',[ViewCseMaterialsController::class, 'deletematerials'])->middleware('auth')->name('deletecsematerial');
Route::resource('/students', StudentsController::class);

Route::get('ETE', [eteController::class, 'ete'])->middleware('auth');
Route::post('ETE', [eteController::class, 'storeinformation'])->name('eteRoute')->middleware('auth');

Route::get('CSE', [AddCseStaffController::class, 'addcsestaff'])->middleware('auth');
Route::post('CSE', [AddCseStaffController::class, 'storeinformation'])->name('cseRoute')->middleware('auth');
Route::post('Comment', [CommentController::class, 'comment'])->name('comment')->middleware('auth');

Route::get('IST', [AddIstStaffController::class, 'addISTstaff'])->middleware('auth');
Route::post('IST', [AddIstStaffController::class, 'storeinformation'])->name('istRoute')->middleware('auth');

Route::get('viewstaff', [ViewStaff::class, 'viewStaff'])->name('viewstaff')->middleware('auth');

Route::get('help', function () {
return view('help');
})->middleware('guest');

Route::post('subjectUploads',[Controller::class, 'documentFunction'])->middleware('auth')->name('uploadSubject');

Route::get('/register', [StudentsController::class, 'index'])->name('register');
//Admin

    Route::get('/ete-hod-view', [AdminController::class, 'indexAdmin'])->middleware('auth')->name('admin');
    Route::get('/cse-hod', [ViewStaffCSE::class, 'viewStaffcse'])->middleware('auth')->name('cse-hod');
    Route::get('/cse-hod-view', [HodCseController::class, 'hod_cse_view'])->middleware('auth')->name('cse-view');

    Route::get('/ist-hod-view', [HodIstController::class, 'hod_ist_view'])->middleware('auth')->name('ist-view');
    Route::get('/ist-hod', [ViewStaffIST::class, 'viewStaffist'])->middleware('auth')->name('ist-hod');
    //Route::get('/admin', [AdminController::class, 'retrievalData'])->middleware('auth')->name('dataretrieved');
    Route::get('/ete-instructor', [Controller::class, 'index'])->middleware('auth')->name('ete-instructor');
    Route::get('/cse-instructor', [CseInstructorController::class, 'index'])->middleware('auth')->name('cse-instructor');
    Route::get('/ist-instructor', [IstInstructorController::class, 'index'])->middleware('auth')->name('ist-instructor');
Auth::routes(['verify'=>true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('delete/{id}', [AdminController::class, 'deletefunction'])->name('delete');

Route::get('delete/{id}', [ViewStaff::class, 'functiondelete'])->name('deleteinstructor');

Route::get('delete/{id}', [eteController::class, 'functiondeleteOnETE'])->name('deleteinstructor');
