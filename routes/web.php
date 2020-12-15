<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimaryController; 


##PrimaryController
Route::get('/',[PrimaryController::class,'home']); //Route for Homepage 
