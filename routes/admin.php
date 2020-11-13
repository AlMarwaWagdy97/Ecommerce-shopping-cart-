<?php

use App\Categorie;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){
    Config::set('auth.defines', 'admin');

    Route::get('/login', 'AdminAuthController@ShowloginForm');
    Route::post('/login', 'AdminAuthController@login_post');
   
    Route::group(['middleware' => 'admin:admin'], function(){
        Route::any('/', 'AdminAuthController@index');
        Route::any('logout', 'AdminAuthController@logout');

        // Categories
        Route::resource('category','CategoriesController');
        
    });
    
});
