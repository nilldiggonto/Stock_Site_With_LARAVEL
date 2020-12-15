<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimaryController; 


##PrimaryController
Route::get('/',[PrimaryController::class,'home']); //Route for Homepage 
Route::get('/load',[PrimaryController::class,'load']); //Load Json Form
Route::post('/store',[PrimaryController::class,'store']);//Saving data to SQL