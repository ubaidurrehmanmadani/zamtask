<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/addUser', [App\Http\Controllers\HomeController::class, 'addUser']);


//Admin Routes
Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::post('admin/addAdmin', [App\Http\Controllers\AdminController::class, 'addAdmin'])->middleware('is_admin');



//Editor ROutes
Route::get('editor/home', [App\Http\Controllers\EditorController::class, 'editorHome'])->name('editor.home')->middleware('is_editor');
Route::post('editor/addEditor', [App\Http\Controllers\EditorController::class, 'addEditor'])->middleware('is_editor');
