<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return to_route('jobs.index');
});

Route::resource('jobs', JobController::class)->only(['index', 'show']);

Route::resource('auth', AuthController::class)->only(['create', 'store']);

// We use the delete operation for this request to delete the resource, also to protect the user from CSRF
// Route::delete('logout', fn() => to_route('auth.destroy'));
Route::delete('auth', [AuthController::class, 'destroy'])->name('logout');


Route::middleware('auth')->group(function(){
    Route::resource('job.application', JobApplicationController::class)->only(['create', 'store']);

    Route::resource('my-job-applications', MyJobApplicationController::class)->only(['index', 'destroy']);

    Route::resource('employer', EmployerController::class)
        ->only(['create', 'store']);
    Route::middleware('employer')->resource('my-jobs', MyJobController::class);
    // Route for downloading CV
    Route::get('/job-applications/{application}/download-cv', [JobApplicationController::class, 'downloadCV'])
    ->name('job-applications.download-cv');
});

