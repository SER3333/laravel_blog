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


Route::group(['namespace' => 'main'], function(){
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace' => 'post', 'prefix' => 'posts'], function(){
    Route::get('/', 'IndexController')->name('posts.index');
    Route::get('/{post}', 'ShowController')->name('posts.show');

    
    Route::group(['namespace' => 'comment', 'prefix' => '{post}/comment'], function(){
        Route::post('/', 'StoreController')->name('posts.commene.store');
    });
    
    Route::group(['namespace' => 'liked', 'prefix' => '{post}/liked'], function(){
        Route::post('/', 'StoreController')->name('posts.liked.store');
        
    });
});

Route::group(['namespace' => 'personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function(){

    Route::group(['namespace' => 'main', 'prefix' => 'main'], function(){
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace' => 'comment', 'prefix' => 'comment'], function(){
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}', 'DeleteController')->name('personal.comment.delete');
    });                             
    Route::group(['namespace' => 'liked', 'prefix' => 'liked'], function(){
        Route::get('/', 'IndexController')->name('personal.liked.index');
        Route::delete('/{post}', 'DeleteController')->name('personal.liked.delete');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function(){
    
    Route::group(['namespace' => 'main'], function(){
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'users', 'prefix' => 'users'], function(){
        Route::get('/', 'IndexController')->name('admin.users.index');
        Route::get('/create', 'CreateController')->name('admin.users.create');
        Route::post('/', 'StoreController')->name('admin.users.store');
        Route::get('/{user}', 'ShowController')->name('admin.users.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.users.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.users.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.users.delete');   
    });

    Route::group(['namespace' => 'posts', 'prefix' => 'posts'], function(){
        Route::get('/', 'IndexController')->name('admin.posts.index');
        Route::get('/create', 'CreateController')->name('admin.posts.create');
        Route::post('/', 'StoreController')->name('admin.posts.store');
        Route::get('/{post}', 'ShowController')->name('admin.posts.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.posts.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.posts.update');
        Route::delete('/{post}', 'DeleteController')->name('admin.posts.delete');   
    });
    
    Route::group(['namespace' => 'categories', 'prefix' => 'categories'], function(){
        Route::get('/', 'IndexController')->name('admin.categories.index');
        Route::get('/create', 'CreateController')->name('admin.categories.create');
        Route::post('/', 'StoreController')->name('admin.categories.store');
        Route::get('/{category}', 'ShowController')->name('admin.categories.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.categories.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.categories.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.categories.delete');   
    });
    Route::group(['namespace' => 'tags', 'prefix' => 'tags'], function(){
        Route::get('/', 'IndexController')->name('admin.tags.index');
        Route::get('/create', 'CreateController')->name('admin.tags.create');
        Route::post('/', 'StoreController')->name('admin.tags.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tags.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tags.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tags.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tags.delete');   
    });

    Route::group(['namespace' => 'roles', 'prefix' => 'roles'], function(){
        Route::get('/', 'IndexController')->name('admin.roles.index');
        Route::get('/create', 'CreateController')->name('admin.roles.create');
        Route::post('/', 'StoreController')->name('admin.roles.store');
        Route::get('/{role}', 'ShowController')->name('admin.roles.show');
        Route::get('/{role}/edit', 'EditController')->name('admin.roles.edit');
        Route::patch('/{role}', 'UpdateController')->name('admin.roles.update');
        Route::delete('/{role}', 'DeleteController')->name('admin.roles.delete');   
    });
    
});


Auth::routes(['verify'=>true]);


