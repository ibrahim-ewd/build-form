<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FormController::class,"index"]);
Route::get('/iframe', [FormController::class,"getiframe"]);

Route::get('/form/{from}', [FormController::class,"getForm"]);

Route::post('/add-data-form', [FormController::class,"store"]);
Route::post('/upload-images', [FormController::class,"uploadImagesForm"]);
Route::post('/delete-images', [FormController::class,"deleteImagesForm"]);
Route::get('/get-data-form', [FormController::class,"getDataForm"]);
Route::get('/get-view-edit-field', [FormController::class,"getViewEditField"]);
