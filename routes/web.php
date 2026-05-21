<?php

use Illuminate\Support\Facades\Route;
use App\Models\program;
use App\Models\project;
use App\Models\accomplishment;
 use App\Http\Controllers\Student\StudentSettingsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApprovedApplicantController;
use App\Models\accomplishment_img;
use App\Models\narratives;
use App\Models\images;
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

Route::get('narrativef', function () {

  

        $narratives = narratives::all();

    return view('narrative', compact('narratives'));

});
Route::get('/landaccomplishment', function () {

    $data = program::all();
    
        $view = $data->unique('department');

        $category = program::all();

       
        $images = Images::with('accomplishment')->get()->groupBy('accomplishment_id');

    $narrative= $data->unique('department');

        $category = narratives::all();

    return view('accomplishment', compact('view','category','images','narrative'));
});









Route::get('/', function () {

    $datad = accomplishment::all();
    
        $viewed = $datad->unique('department');


    $datas = project::all();
    
        $views = $datas->unique('department');


    $data = program::all();
    
        $view = $data->unique('department');



        $category = program::all();

       
        $images = Images::with('accomplishment')->get()->groupBy('accomplishment_id');

    $narrative= $data->unique('department');

        $category = narratives::all();

    return view('welcome', compact('view','category','images','narrative', 'views', 'viewed'));
});


Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/student/dashboard',
        [StudentController::class, 'dashboard'])
        ->name('student.dashboard');

    Route::post('/student/save-pds',
        [StudentController::class, 'store'])
        ->name('student.store');


        /*
|--------------------------------------------------------------------------
| PRINT PDS
|--------------------------------------------------------------------------
*/

Route::get('/student/pds/print',
    [StudentController::class, 'print'])
    ->name('student.print');

/*
|--------------------------------------------------------------------------
| DOWNLOAD PDF
|--------------------------------------------------------------------------
*/

Route::get('/student/pds/pdf',
    [StudentController::class, 'downloadPdf'])
    ->name('student.pdf');

   

Route::get('/student/settings', [StudentSettingsController::class, 'index'])
    ->name('student.settings');

    Route::get('/student/settings', function () {
    return view('student.settings');
})->name('student.settings');

Route::post('/student/settings/update', [StudentSettingsController::class, 'update'])
    ->name('student.settings.update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('/')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\admin\adminCtrl::class, 'index']);

    Route::resource('/user', 'App\Http\Controllers\Admin\adminuser');
    Route::resource('program', 'App\Http\Controllers\Admin\program\programCtrl');
    Route::resource('accomplishment', 'App\Http\Controllers\Admin\program\accomplishmentCtrl');
    Route::resource('narrative', 'App\Http\Controllers\Admin\project\narrative');
    Route::resource('project', 'App\Http\Controllers\Admin\project\projectCtrl');

    /*
    |--------------------------------------------------------------------------
    | APPLICANTS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/applicants',
        [ApprovedApplicantController::class, 'applicants']
    )->name('admin.applicants');

    /*
    |--------------------------------------------------------------------------
    | APPROVED APPLICANTS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/approved-applicants',
        [ApprovedApplicantController::class, 'index']
    )->name('admin.approved.applicants');

    /*
    |--------------------------------------------------------------------------
    | APPROVE APPLICANT
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/admin/approve/{id}',
        [ApprovedApplicantController::class, 'approve']
    )->name('admin.approve');

    /*
    |--------------------------------------------------------------------------
    | DELETE APPROVED APPLICANT
    |--------------------------------------------------------------------------
    */

    Route::delete(
        '/admin/approved-applicants/{id}',
        [ApprovedApplicantController::class, 'destroy']
    )->name('admin.approved.delete');

    Route::get(
    '/admin/approved-applicants/export',
    [ApprovedApplicantController::class, 'export']
)->name('admin.approved.export');

Route::get(
    '/admin/settings',
    [App\Http\Controllers\Admin\AdminSettingsController::class, 'index']
)->name('admin.settings');

Route::post(
    '/admin/settings/update',
    [App\Http\Controllers\Admin\AdminSettingsController::class, 'update']
)->name('admin.settings.update');

/*
|--------------------------------------------------------------------------
| UPDATE PASSWORD
|--------------------------------------------------------------------------
*/
Route::post(
    '/admin/settings/update-password',
    [App\Http\Controllers\Admin\AdminSettingsController::class, 'updatePassword']
)->name('admin.settings.update.password');

});




Route::prefix('/')->middleware(['auth','deptAdmin'])->group(function () { 

    Route::get('/departmentadmin', [App\Http\Controllers\Dept\deptadminCtrl::class, 'index']);

    Route::resource('accomplishment', 'App\Http\Controllers\Dept\accomplismentCtrl');
    Route::resource('projects', 'App\Http\Controllers\Dept\projectCtrl');

});

Route::resource('landproject', 'App\Http\Controllers\landingpage\landingprojectCtrl');
Route::resource('landprogram', 'App\Http\Controllers\landingpage\landingprogramCtrl');
Route::resource('landnarrative', 'App\Http\Controllers\landingpage\narrativeCtrl');
Route::resource('landaccomp', 'App\Http\Controllers\landingpage\landingaccompCtrl');

