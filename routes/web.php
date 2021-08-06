<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\PipelineYajraController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OutletController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\SummaryAreaController;
use App\Http\Controllers\SummaryOutletController;
use App\Http\Controllers\SummaryMarketingController;

use App\Http\Controllers\SummaryDgnpfController;
use App\Http\Controllers\SummaryDgkol2Controller;

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/welcome', function () {
    return view('welcome');
});




/*
|--------------------------------------------------------------------------
| Route list untuk login dan register
|--------------------------------------------------------------------------
*/ 


Auth::routes();

Route::middleware(['auth'])->group(function () {


    // Route::get('/', function () {
    //     return view('index');
    // });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [AdminController::class, 'index']);
    });

    Route::middleware(['user'])->group(function () {
        Route::get('user', [UserController::class, 'index']);
    });


    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

}); 








/*
|--------------------------------------------------------------------------
| Route Summary Area dan Outlet Controller
|--------------------------------------------------------------------------
*/        


    Route::get('/',[HomeController::class, 'index'])->name('homeindex');

    Route::get('/summaryArea',[SummaryAreaController::class, 'areapage'])->name('areapage');
    Route::get('/summaryOutlet',[SummaryOutletController::class, 'outletpage'])->name('outletpage');
    Route::get('/summaryMarketing',[SummaryMarketingController::class, 'marketingpage'])->name('marketingpage');

    Route::get('/summarydgnpf',[SummaryDgnpfController::class, 'index'])->name('index');
    Route::get('/summarydgkol2',[SummaryDgkol2Controller::class, 'index'])->name('index');




















/*
|--------------------------------------------------------------------------
| Route PipelineController ---- list untuk 'admin' dan 'user'
|--------------------------------------------------------------------------
*/        


    Route::get('/pipeline',[PipelineController::class, 'index'])->name('pipeline_index')->middleware('auth');

    Route::get('/pipelineyajra',[PipelineYajraController::class, 'index'])->name('pipelineyajra')->middleware('auth');

    Route::get('/pipelineCreate',[PipelineController::class, 'create'])->name('pipelineCreate')->middleware('auth');
    Route::post('/pipelineStore',[PipelineController::class, 'store'])->name('pipelineStore')->middleware('auth');

    Route::get('/pipelineShow/{id}',[PipelineController::class, 'show'])->name('pipelineShow')->middleware('auth');
    Route::post('/pipelineUpdate/{id}',[PipelineController::class, 'update'])->name('pipelineUpdate')->middleware('auth');
    Route::get('/pipelineDelete/{id}',[PipelineController::class, 'destroy'])->name('pipelineDelete')->middleware('auth');


    Route::get('/pipelineExport',[PipelineController::class, 'pipelineExport'])->name('pipelineExport');


/*
|--------------------------------------------------------------------------
| Route NasabahnpfController ---- list untuk 'admin' dan 'user'
|--------------------------------------------------------------------------
*/       

Route::resource('/nasabahnpf', NasabahnpfController::class)->middleware('auth'); // halaman nasabah dg npf per outlet (radio form)



/*
|--------------------------------------------------------------------------
| Route Nasabahkol2Controller ---- list untuk 'admin' dan 'user'
|--------------------------------------------------------------------------
*/       

Route::resource('/nasabahkol2', Nasabahkol2Controller::class)->middleware('auth');




















/*
|--------------------------------------------------------------------------
| Route list hanya untuk 'admin'
|--------------------------------------------------------------------------
*/        

/*
|--------------------------------------------------------------------------
| Segment Controller
|--------------------------------------------------------------------------
*/

Route::get('/segmen',[SegmentController::class, 'index'])->name('segmentIndex')->middleware('auth');
Route::get('/segmentCreate',[SegmentController::class, 'create'])->name('segmentCreate')->middleware('auth');
Route::post('/segmentStore',[SegmentController::class, 'store'])->name('segmentStore')->middleware('auth');
Route::get('/segmentShow/{id}',[SegmentController::class, 'show'])->name('segmentShow')->middleware('auth');
Route::post('/segmentUpdate/{id}',[SegmentController::class, 'update'])->name('segmentUpdate')->middleware('auth');
Route::get('/segmentDelete/{id}',[SegmentController::class, 'destroy'])->name('segmentDelete')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Progress Controller
|--------------------------------------------------------------------------
*/

Route::get('/progress',[ProgressController::class, 'index'])->name('progressIndex')->middleware('auth');
Route::get('/progressCreate',[ProgressController::class, 'create'])->name('progressCreate')->middleware('auth');
Route::post('/progressStore',[ProgressController::class, 'store'])->name('progressStore')->middleware('auth');
Route::get('/progressShow/{id}',[ProgressController::class, 'show'])->name('progressShow')->middleware('auth');
Route::post('/progressUpdate/{id}',[ProgressController::class, 'update'])->name('progressUpdate')->middleware('auth');
Route::get('/progressDelete/{id}',[ProgressController::class, 'destroy'])->name('progressDelete')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Jabatan Controller
|--------------------------------------------------------------------------
*/

Route::get('/jabatan',[JabatanController::class, 'index'])->name('jabatanIndex')->middleware('auth');
Route::get('/jabatanCreate',[JabatanController::class, 'create'])->name('jabatanCreate')->middleware('auth');
Route::post('/jabatanStore',[JabatanController::class, 'store'])->name('jabatanStore')->middleware('auth');
Route::get('/jabatanShow/{id}',[JabatanController::class, 'show'])->name('jabatanShow')->middleware('auth');
Route::post('/jabatanUpdate/{id}',[JabatanController::class, 'update'])->name('jabatanUpdate')->middleware('auth');
Route::get('/jabatanDelete/{id}',[JabatanController::class, 'destroy'])->name('jabatanDelete')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Employee Controller
|--------------------------------------------------------------------------
*/

Route::get('/employee',[EmployeeController::class, 'index'])->name('employeeIndex')->middleware('auth');
Route::get('/employeeCreate',[EmployeeController::class, 'create'])->name('employeeCreate')->middleware('auth');
Route::post('/employeeStore',[EmployeeController::class, 'store'])->name('employeeStore')->middleware('auth');
Route::get('/employeeShow/{id}',[EmployeeController::class, 'show'])->name('employeeShow')->middleware('auth');
Route::post('/employeeUpdate/{id}',[EmployeeController::class, 'update'])->name('employeeUpdate')->middleware('auth');
Route::get('/employeeDelete/{id}',[EmployeeController::class, 'destroy'])->name('employeeDelete')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Outlet Controller
|--------------------------------------------------------------------------
*/

Route::get('/outlet',[OutletController::class, 'index'])->name('outletIndex')->middleware('auth');
Route::get('/outletCreate',[OutletController::class, 'create'])->name('outletCreate')->middleware('auth');
Route::post('/outletStore',[OutletController::class, 'store'])->name('outletStore')->middleware('auth');
Route::get('/outletShow/{id}',[OutletController::class, 'show'])->name('outletShow')->middleware('auth');
Route::post('/outletUpdate/{id}',[OutletController::class, 'update'])->name('outletUpdate')->middleware('auth');
Route::get('/outletDelete/{id}',[OutletController::class, 'destroy'])->name('outletDelete')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Profile Controller
|--------------------------------------------------------------------------
*/


Route::get('/profileEmployee',[ProfileController::class, 'profileEmployee'])->name('profileForm')->middleware('auth');
Route::post('/profileStore/{id}',[ProfileController::class, 'profileStore'])->name('profileStore')->middleware('auth');


