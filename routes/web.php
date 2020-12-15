<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\PrimaryController; #For Homepage


##PrimaryController
Route::get('/',[PrimaryController::class,'home']); #Route for Homepage 