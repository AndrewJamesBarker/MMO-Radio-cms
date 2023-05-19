<?php

use App\Models\Project;
use App\Models\Segment;
use App\Http\Controllers\InternalSystemsController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SegmentTypesController;
use App\Http\Controllers\SegmentFieldsController;
use App\Http\Controllers\SubSegmentTypesController;
use App\Http\Controllers\SegmentsController;
use App\Http\Controllers\SegmentFormController;
use Illuminate\Support\Facades\Route;



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

Route::get('/', function () {
    return view('welcome', [
        'segments' => Segment::all(),
    ]);
});

Route::get('/project/{project:slug}', function (Project $project) {
    return view('project', [
        'project' => $project,
    ]);
})->where('project', '[A-z\-]+');

Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');

Route::get('/console/projects/list', [ProjectsController::class, 'list'])->middleware('auth');
Route::get('/console/projects/add', [ProjectsController::class, 'addForm'])->middleware('auth');
Route::post('/console/projects/add', [ProjectsController::class, 'add'])->middleware('auth');
Route::get('/console/projects/edit/{project:id}', [ProjectsController::class, 'editForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/edit/{project:id}', [ProjectsController::class, 'edit'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/delete/{project:id}', [ProjectsController::class, 'delete'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/image/{project:id}', [ProjectsController::class, 'imageForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/image/{project:id}', [ProjectsController::class, 'image'])->where('project', '[0-9]+')->middleware('auth');

Route::get('/console/users/list', [UsersController::class, 'list'])->middleware('auth');
Route::get('/console/users/add', [UsersController::class, 'addForm'])->middleware('auth');
Route::post('/console/users/add', [UsersController::class, 'add'])->middleware('auth');
Route::get('/console/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/console/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/console/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');

Route::get('/console/types/list', [TypesController::class, 'list'])->middleware('auth');
Route::get('/console/types/add', [TypesController::class, 'addForm'])->middleware('auth');
Route::post('/console/types/add', [TypesController::class, 'add'])->middleware('auth');
Route::get('/console/types/edit/{type:id}', [TypesController::class, 'editForm'])->where('type', '[0-9]+')->middleware('auth');
Route::post('/console/types/edit/{type:id}', [TypesController::class, 'edit'])->where('type', '[0-9]+')->middleware('auth');
Route::get('/console/types/delete/{type:id}', [TypesController::class, 'delete'])->where('type', '[0-9]+')->middleware('auth');

Route::get('/console/segment_types/list', [SegmentTypesController::class, 'list'])->middleware('auth'); 
Route::get('/console/segment_types/add', [SegmentTypesController::class, 'addForm'])->middleware('auth');
Route::post('/console/segment_types/add', [SegmentTypesController::class, 'add'])->middleware('auth');
Route::get('/console/segment_types/edit/{segment_type:id}', [SegmentTypesController::class, 'editForm'])->where('segment_type', '[0-9]+')->middleware('auth');
Route::post('/console/segment_types/edit/{segment_type:id}', [SegmentTypesController::class, 'edit'])->where('segment_type', '[0-9]+')->middleware('auth');
Route::get('/console/segment_types/delete/{segment_type:id}', [SegmentTypesController::class, 'delete'])->where('segment_type', '[0-9]+')->middleware('auth');

Route::get('/console/segment_fields/list', [SegmentFieldsController::class, 'list'])->middleware('auth'); 
Route::get('/console/segment_fields/add', [SegmentFieldsController::class, 'addForm'])->middleware('auth');
Route::post('/console/segment_fields/add', [SegmentFieldsController::class, 'add'])->middleware('auth');
Route::get('/console/segment_fields/edit/{segment_field:id}', [SegmentFieldsController::class, 'editForm'])->where('segment_field', '[0-9]+')->middleware('auth');
Route::post('/console/segment_fields/edit/{segment_field:id}', [SegmentFieldsController::class, 'edit'])->where('segment_field', '[0-9]+')->middleware('auth');
Route::get('/console/segment_fields/delete/{segment_field:id}', [SegmentFieldsController::class, 'delete'])->where('segment_field', '[0-9]+')->middleware('auth');

Route::get('/console/sub_segment_types/list', [SubSegmentTypesController::class, 'list'])->middleware('auth'); 
Route::get('/console/sub_segment_types/add', [SubSegmentTypesController::class, 'addForm'])->middleware('auth');
Route::post('/console/sub_segment_types/add', [SubSegmentTypesController::class, 'add'])->middleware('auth');
Route::get('/console/sub_segment_types/edit/{sub_segment_type:id}', [SubSegmentTypesController::class, 'editForm'])->where('sub_segment_type', '[0-9]+')->middleware('auth');
Route::post('/console/sub_segment_types/edit/{sub_segment_type:id}', [SubSegmentTypesController::class, 'edit'])->where('sub_segment_type', '[0-9]+')->middleware('auth');
Route::get('/console/sub_segment_types/delete/{sub_segment_type:id}', [SubSegmentTypesController::class, 'delete'])->where('sub_segment_type', '[0-9]+')->middleware('auth');

Route::get('/console/internal_systems/list', [InternalSystemsController::class, 'list'])->middleware('auth'); 
Route::get('/console/internal_systems/add', [InternalSystemsController::class, 'addForm'])->middleware('auth');
Route::post('/console/internal_systems/add', [InternalSystemsController::class, 'add'])->middleware('auth');
Route::get('/console/internal_systems/edit/{internal_system:id}', [InternalSystemsController::class, 'editForm'])->where('internal_system', '[0-9]+')->middleware('auth');
Route::post('/console/internal_systems/edit/{internal_system:id}', [InternalSystemsController::class, 'edit'])->where('internal_system', '[0-9]+')->middleware('auth');
Route::get('/console/internal_systems/delete/{internal_system:id}', [InternalSystemsController::class, 'delete'])->where('internal_system', '[0-9]+')->middleware('auth');
Route::get('/console/internal_systems/image/{internal_system:id}', [InternalSystemsController::class, 'imageForm'])->where('segment', '[0-9]+')->middleware('auth');
Route::post('/console/internal_systems/image/{internal_system:id}', [InternalSystemsController::class, 'image'])->where('internal_system', '[0-9]+')->middleware('auth');

Route::get('/console/segments/list', [SegmentsController::class, 'list'])->middleware('auth'); 
Route::get('/console/segments/add', [SegmentsController::class, 'addForm'])->middleware('auth');
Route::post('/console/segments/add', [SegmentsController::class, 'add'])->middleware('auth');
Route::get('/console/segments/edit/{segment:id}', [SegmentsController::class, 'editForm'])->where('segment', '[0-9]+')->middleware('auth');
Route::post('/console/segments/edit/{segment:id}', [SegmentsController::class, 'edit'])->where('segment', '[0-9]+')->middleware('auth');
Route::get('/console/segments/delete/{segment:id}', [SegmentsController::class, 'delete'])->where('segment', '[0-9]+')->middleware('auth');
Route::get('/console/segments/image/{segment:id}', [SegmentsController::class, 'imageForm'])->where('segment', '[0-9]+')->middleware('auth');
Route::post('/console/segments/image/{segment:id}', [SegmentsController::class, 'image'])->where('segment', '[0-9]+')->middleware('auth');


Route::get('/console/segment_forms/list', [SegmentFormController::class, 'list'])->middleware('auth'); 
Route::get('console/segment_forms/add', [SegmentFormController::class, 'showForm'])->name('segments.add')->middleware('auth');



