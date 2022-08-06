<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[MainController::class,'index']);
Route::post('/',[MainController::class,'form_save'])->name('form_save');
Route::get('/post/{id}/{slug}',[MainController::class,'show'])->name('show');




Route::prefix('/admin')
    ->controller(AdminController::class)
    ->group(function () {

        Route::get('/index','admin_index')->name('admin_index');
        Route::get('/articles','articles')->name('admin_articles');
        Route::post('/articles','articles_save')->name('admin_articles_save');
        Route::get('/comments','admin_comments')->name('admin_comments');
        Route::post('/comments','admin_comments_save_form')->name('admin_comments_save');
        Route::delete('/delete/{id}','destroy')->name('delete');
        Route::get('/edit/{data}','edit')->name('edit');
        Route::put('/edit/{id}','update')->name('update');
        Route::get('/form/message','form_message')->name('form_message');
        Route::delete('/delete_form/{id}','form_destroy')->name('form_delete');
        Route::get('/editt/{id}','editt_form')->name('editt_form');
        Route::put('/editt/{id}','update_form')->name('update_form');
    });




