<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    redirect('jobs');
});

Route::resource('jobs', JobController::class)->only(['index', 'show']);


