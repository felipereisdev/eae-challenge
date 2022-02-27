<?php

use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

Route::resource('/jobs', JobsController::class);
