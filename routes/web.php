<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimaryController; 
use App\Http\Controllers\JsonController;
use App\Http\Controllers\StockController;
##PrimaryController
Route::get('/',[PrimaryController::class,'home']); //Route for Homepage 
Route::get('/load',[PrimaryController::class,'load']); //Load Json Form
Route::post('/store',[PrimaryController::class,'store']);//Saving data to SQL


//filter
Route::get('/filter',[JsonController::class,'filter']);
Route::get('/og/filter',[StockController::class,'filter']);
// RESOURCE
Route::resource('stocks',JsonController::class); #JSON CRUD
Route::resource('og',StockController::class); #SQL CRUD