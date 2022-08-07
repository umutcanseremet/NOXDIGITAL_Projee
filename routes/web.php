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
Route::post('/',[MainController::class,'formSave'])->name('form_save');
Route::get('/post/{id}/{slug}',[MainController::class,'show'])->name('show');




Route::prefix('/admin')
    ->controller(AdminController::class)
    ->group(function () {

        Route::get('/index','adminIndex')->name('adminIndex');
        Route::get('/articles','articles')->name('adminArticles');
        Route::post('/articles','createArticle')->name('admin_articles_save');
        Route::get('/comments','adminComments')->name('adminComments');
        Route::post('/comments','adminCommentsSaveForm')->name('admin_comments_save');
        Route::get('comment','commentData')->name('commentData');
        Route::delete('/delete/{id}','destroy')->name('delete');
        Route::get('/edit/{data}','edit')->name('edit');
        Route::put('/edit/{id}','update')->name('update');
        Route::get('/form/message','formMessage')->name('formMessage');
        Route::delete('/delete_form/{id}','formDestroy')->name('formDelete');
        Route::get('/editt/{id}','editForm')->name('editForm');
        Route::put('/editt/{id}','updateForm')->name('updateForm');
        Route::get('comment','commentData')->name('commentData');
        Route::delete('/deleteComment/{id}','deleteComment')->name('deleteComment');

        Route::get('/edit/message/{data}','editComment')->name('editComment');
        Route::put('/edit/message/{id}','updateFormEdit')->name('updateFormEdit');
    });




