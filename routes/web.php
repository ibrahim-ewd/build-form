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


Route::get('/', function (){
    return redirect()->route("form.index");
});



Route::group(['prefix' => 'form'], function () {

//    Route::get('/',function(){ return redirect(\route('webformulaire.show'));    });


    Route::get('/build/{id}', [App\Http\Controllers\FormController::class, "index"])->name("form.build");
    Route::get('/aperçus/{id}', [App\Http\Controllers\FormController::class, "previews"])->name("form.previews");

    Route::get('/get-data-form/{id}', [App\Http\Controllers\FormController::class,"getDataForm"])->name("get.data.form.v2");
    Route::get('/getDataForm2/{id}', [App\Http\Controllers\FormController::class,"getDataForm2"])->name("get.data.getDataForm2.v2");
    Route::post('/add-data-form/{id}', [App\Http\Controllers\FormController::class,"store"])->name("add.data.form.v2");
    Route::get('/get-view-edit-field/{id}', [App\Http\Controllers\FormController::class,"getViewEditField"])->name("get.view_edit.v2");
    Route::post('/upload-images', [App\Http\Controllers\FormController::class,"uploadImagesForm"])->name("upload.image.v2");

    Route::post('/delete-images', [App\Http\Controllers\FormController::class,"deleteImagesForm"])->name("delete.image.v2");


//	require 'confirmation.php';


});
