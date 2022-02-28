<?php

use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

Route::post('/jobs', [JobsController::class, 'index']);
