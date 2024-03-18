<?php

use App\Http\Controllers\AddCseCoursesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CseInstructorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IstInstructorController;
use App\Http\Controllers\AddCseStaffController;
use App\Http\Controllers\AddIstStaffController;
use App\Http\Controllers\AddSubjectsController;
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
use App\Http\Controllers\ViewProfile;
use App\Http\Controllers\ViewStudentProfile;
use App\Http\Controllers\EditViewStudentProfile;
use App\Http\Controllers\EditViewProfile;
use App\Http\Controllers\MakeQuizController;
use App\Http\Controllers\MakeQuizOptionsController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizMarkingController;
use App\Http\Controllers\ViewCseCoursesController;
use App\Http\Controllers\ViewCseSubjectsController;
use App\Http\Controllers\ViewStudentScoresController;
use App\Http\Controllers\AddEteCoursesController;
use App\Http\Controllers\AddEteSubjectsController;
use App\Http\Controllers\AddIstCoursesController;
use App\Http\Controllers\AddIstSubjectsController;
use App\Http\Controllers\CseAssignmentCreationController;
use App\Http\Controllers\CseDocumentsController;
use App\Http\Controllers\EteDocumentsController;
use App\Http\Controllers\MakeEteQuizAnswerOptionsController;
use App\Http\Controllers\MakeEteQuizController;
use App\Http\Controllers\MakeEteQuizMarkingController;
use App\Http\Controllers\MakeIstAnswerQuizOptionsController;
use App\Http\Controllers\MakeIstQuizQuestionsController;
use App\Http\Controllers\ViewCseAssignmentScores;
use App\Http\Controllers\ViewCseCourseSubjectsController;
use App\Http\Controllers\ViewCseStudentsController;
use App\Http\Controllers\ViewEteCoursesController;
use App\Http\Controllers\ViewEteCourseSubjectsController;
use App\Http\Controllers\ViewEteQuizController;
use App\Http\Controllers\ViewEteStudentsController;
use App\Http\Controllers\ViewEteStudentScoresController;
use App\Http\Controllers\ViewEteSubjectsController;
use App\Http\Controllers\ViewIstCoursesController;
use App\Http\Controllers\ViewIstStudentsController;
use App\Http\Controllers\ViewIstSubjectsController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models;
use App\Models\Course;
use App\Models\Department;
use App\Models\Instructors;
use App\Livewire\CseInstructorLivewire;
use App\Livewire\MakeEteQuizAnswerOptionsLivewire;
use App\Livewire\MaterialsFormLivewire;
use App\Livewire\ViewCseStudentsLivewire;

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

Route::get('/cse-students', ViewCseStudentsLivewire::class)->name('view.cse');

Route::get('view_materials', [ViewMaterialsController::class, 'index'])->middleware('auth');
Route::get('view_materials/{id}', [ViewMaterialsController::class, 'deletematerials'])->middleware('auth')->name('deletematerial');

Route::resource('/students', StudentsController::class);



Route::group(["middleware" => "CseHodMiddleware"], function () {

    Route::get('CSE', [AddCseStaffController::class, 'addcsestaff'])->middleware('auth');
    Route::post('CSE', [AddCseStaffController::class, 'storeinformation'])->name('cseRoute')->middleware('auth');
    Route::get('/cse-hod', [ViewStaffCSE::class, 'viewStaffcse'])->middleware('auth')->name('cse-hod');
    Route::get('CSE/add-cse-courses', [AddCseCoursesController::class, 'index'])->middleware('auth');
    Route::get('CSE/view-cse-courses', [ViewCseCoursesController::class, 'index'])->middleware('auth');
    Route::get('CSE/add-cse-subjects', [AddSubjectsController::class, 'index'])->middleware('auth');
    Route::get('CSE/view-cse-subjects', [ViewCseSubjectsController::class, 'index'])->middleware('auth');
    Route::get('CSE/delete-cse-subject/{id}', [ViewCseSubjectsController::class, 'deletesubjects'])->middleware('auth')->name('deletesubject');
    Route::get('/cse-hod-view', [HodCseController::class, 'hod_cse_view'])->middleware('auth')->name('cse-view');
});

Route::group(["middleware" => "EteHodMiddleware"], function () {
    Route::get('ETE', [eteController::class, 'ete'])->middleware('auth');
    Route::post('ETE', [eteController::class, 'storeinformation'])->name('eteRoute')->middleware('auth');
    Route::get('viewstaff', [ViewStaff::class, 'viewStaff'])->name('viewstaff')->middleware('auth');
    Route::get('ETE/add-ete-courses', [AddEteCoursesController::class, 'index'])->middleware('auth');
    Route::get('ETE/view-ete-courses', [ViewEteCoursesController::class, 'index'])->middleware('auth');
    Route::get('ETE/add-ete-subjects', [AddEteSubjectsController::class, 'index'])->middleware('auth');
    Route::get('ETE/view-ete-subjects', [ViewEteSubjectsController::class, 'index'])->middleware('auth');
    Route::get('ETE/delete-ete-subject/{id}', [ViewEteSubjectsController::class, 'deletesubjects'])->middleware('auth')->name('deletesubject');
    Route::get('/ete-hod-view', [AdminController::class, 'indexAdmin'])->middleware('auth')->name('admin');

});

Route::group(["middleware" => "IstHodMiddleware"], function () {

    Route::get('IST', [AddIstStaffController::class, 'addISTstaff'])->middleware('auth');
    Route::post('IST', [AddIstStaffController::class, 'storeinformation'])->name('istRoute')->middleware('auth');
    Route::get('/ist-hod-view', [HodIstController::class, 'hod_ist_view'])->middleware('auth')->name('ist-view');
    Route::get('/ist-hod', [ViewStaffIST::class, 'viewStaffist'])->middleware('auth')->name('ist-hod');
    Route::get('IST/add-ist-courses', [AddIstCoursesController::class, 'index'])->middleware('auth');
    Route::get('IST/view-ist-courses', [ViewIstCoursesController::class, 'index'])->middleware('auth');
    Route::get('IST/add-ist-subjects', [AddIstSubjectsController::class, 'index'])->middleware('auth');
    Route::get('IST/view-ist-subjects', [ViewIstSubjectsController::class, 'index'])->middleware('auth');
});

Route::group(["middleware" => "CseInstructorMiddleware"], function(){

    Route::get('view_cse_materials', [ViewCseMaterialsController::class, 'index'])->middleware('auth');
    Route::get('view_cse_materials/{id}', [ViewCseMaterialsController::class, 'deletematerials'])->middleware('auth')->name('deletecsematerial');
    Route::get('CSE/make-quiz', [MakeQuizController::class, 'index'])->middleware('auth');
    Route::get('CSE/make-quiz-answer-options', [MakeQuizOptionsController::class, 'index'])->middleware('auth');
    Route::get('CSE/mark-quiz-answer-options', [QuizMarkingController::class, 'index'])->middleware('auth');
    Route::get('CSE/view-cse-students', [ViewCseStudentsController::class, 'index'])->middleware('auth');
});
// Route::post('Comment', [CommentController::class, 'comment'])->name('comment')->middleware('auth');





Route::get('help', function () {
    return view('help');
})->middleware('guest');

// Route::post('subjectUploads',[Controller::class, 'documentFunction'])->middleware('auth')->name('uploadSubject');

Route::get('/register', [StudentsController::class, 'index'])->name('register');
//Admin





//Route::get('/admin', [AdminController::class, 'retrievalData'])->middleware('auth')->name('dataretrieved');
Route::get('/ete-instructor', [Controller::class, 'index'])->middleware('auth')->name('ete-instructor');
Route::get('/cse-instructor', [CseInstructorController::class, 'index'])->middleware('auth')->name('cse-instructor');

Route::get('/ist-instructor', [IstInstructorController::class, 'index'])->middleware('auth')->name('ist-instructor');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('delete/{id}', [AdminController::class, 'deletefunction'])->name('delete')->middleware('auth');

Route::get('delete-comment/{id}', [AdminController::class, 'deletecomment'])->name('delete')->middleware('auth');

Route::get('delete-complaint/{id}', [AdminController::class, 'deletecomplaint'])->name('delete-complaint')->middleware('auth');

Route::get('delete/{id}', [ViewStaff::class, 'functiondelete'])->name('deleteinstructor')->middleware('auth');

Route::get('delete/{id}', [eteController::class, 'functiondeleteOnETE'])->name('deleteinstructor')->middleware('auth');

Route::post('materials', [CseInstructorLivewire::class, 'materials'])->middleware('auth');

Route::get('view-profile', [ViewProfile::class, 'index']);
Route::get('view-student-profile', [ViewStudentProfile::class, 'index'])->middleware('auth');

Route::get('/edit-user-information/{id}', [EditViewProfile::class, 'index'])->middleware('auth');
Route::put('/update-user-information/{id}', [EditViewProfile::class, 'updateuserprofile'])->middleware('auth')->name('editProfileRoute')->middleware('auth');

Route::get('/edit-student-information/{id}', [EditViewStudentProfile::class, 'index'])->middleware('auth');
Route::put('/edit-student-information/{id}', [EditViewStudentProfile::class, 'updatestudentprofile'])->middleware('auth')->name('editProfileStudentRoute')->middleware('auth');




Route::get('CSE/delete-cse-course/{id}', [ViewCseCoursesController::class, 'deletecourses'])->middleware('auth')->name('deletecourse');


// ete



Route::get('ETE/delete-ete-course/{id}', [ViewEteCoursesController::class, 'deletecourses'])->middleware('auth')->name('deletecourse');




// end ete

Route::get('CSE/view-quiz', [QuizController::class, 'index'])->middleware('auth');
Route::get('CSE/cse-assignment-creation', [CseAssignmentCreationController::class, 'index'])->middleware('auth');
Route::get('CSE/view-cse-course-subjects', [ViewCseCourseSubjectsController::class, 'index'])->middleware('auth');
Route::get('CSE/view-student-scores', [ViewStudentScoresController::class, 'index'])->middleware('auth');
Route::get('CSE/view-student-assignment-scores', [ViewCseAssignmentScores::class, 'index'])->middleware('auth');
Route::get('CSE/view-cse-course-documents/{id}', [CseDocumentsController::class, 'show'])->middleware('auth');

Route::get('ETE/view-ete-students', [ViewEteStudentsController::class, 'index'])->middleware('auth');
Route::get('ETE/view-ete-student-scores', [ViewEteStudentScoresController::class, 'index'])->middleware('auth');
Route::get('ETE/view-ete-course-documents/{id}', [EteDocumentsController::class, 'showEte'])->middleware('auth');
Route::get('ETE/make-ete-quiz', [MakeEteQuizController::class, 'index'])->middleware('auth');
Route::get('ETE/view-ete-quiz', [ViewEteQuizController::class, 'index'])->middleware('auth');
Route::get('ETE/make-ete-quiz-answer-options', [MakeEteQuizAnswerOptionsController::class, 'index'])->middleware('auth');
Route::get('ETE/mark-ete-quiz-answer-options', [MakeEteQuizMarkingController::class, 'index'])->middleware('auth');
Route::get('ETE/view-ete-course-subjects', [ViewEteCourseSubjectsController::class, 'index'])->middleware('auth');



Route::get('IST/delete-ist-course/{id}', [ViewIstCoursesController::class, 'deletecourses'])->middleware('auth')->name('deletecourses');


Route::get('IST/delete-ist-subject/{id}', [ViewIstSubjectsController::class, 'deletesubjects'])->middleware('auth')->name('deletesubject');
Route::get('IST/view-ist-students', [ViewIstStudentsController::class, 'index'])->middleware('auth');
Route::get('IST/make-ist-quiz-answer-options', [MakeIstAnswerQuizOptionsController::class, 'index'])->middleware('auth');
Route::get('IST/make-ist-quiz', [MakeIstQuizQuestionsController::class, 'index'])->middleware('auth');
