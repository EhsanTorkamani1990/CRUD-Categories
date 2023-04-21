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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/category-tree-view','\App\Http\Controllers\CategoryController@manageCategory');
    Route::post('/add-category','\App\Http\Controllers\CategoryController@addCategory')->name('add.category');
    /*Route::get('/update', function () {
        return view('update');
    });*/
    Route::get('/update/{id}','\App\Http\Controllers\CategoryController@postEdit');
    Route::patch('/update/{id}','\App\Http\Controllers\CategoryController@postEdit');
    Route::get('edit-records','\App\Http\Controllers\StudUpdateController@index');
    Route::get('edit/{id}','\App\Http\Controllers\StudUpdateController@show');
    Route::post('edit/{id}','\App\Http\Controllers\StudUpdateController@edit');
    Route::get('delete/{id}','\App\Http\Controllers\StudUpdateController@destroy');
    
   // Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});
Auth::routes();
























