<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('AddData');
// });

Route::get('/',[MyController::class,'AddData']);

Route::get('/student_view',[MyController::class,'student_view']);

Route::post('/storedata',[MyController::class,'storedata']);

Route::get('/studentedit/{id}',[MyController::class,'studentedit']);

Route::put('/update/{id}',[MyController::class,'update']);

Route::get('/studentdelete/{id}',[MyController::class,'studentdelete']);

