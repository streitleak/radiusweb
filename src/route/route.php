<?php

Route::group(['middleware' => 'web','namespace' => 'Streitleak\RadiusWeb'], function() {
    Route::get('index',['as' => 'index', 'uses' => 'RadiusCDRController@index']);    
    Route::get('login',['as' => 'login', 'uses' => 'UserController@showlogin']);
    Route::post('login',['as' => 'login', 'uses' => 'UserController@dologin']);    
    Route::get('resetpassword',['as' => 'resetpassword', 'uses' => 'UserController@showresetpassword']);
    Route::post('resetpassword',['as' => 'doresetpassword', 'uses' => 'UserController@doresetpassword']);
    Route::group(['middleware' => 'auth' ], function() {
        Route::get('profile',['as' =>'profile', 'uses'=>'UserController@showprofile']);
        Route::post('profile',['as' =>'editprofile', 'uses'=>'UserController@doprofile']);
        Route::any('logout',['as' => 'logout', 'uses' => 'UserController@dologout']);    
        Route::get('cdr' , ['as'=>'showcdr', 'uses' => 'RadiusCDRController@showcdr']);
        Route::post('cdr' , ['as' => 'customcdr', 'uses' => 'RadiusCDRController@customcdr']);
        Route::get('rate' , ['as' => 'showrate', 'uses' => 'RateController@showrate']);
        Route::post('rate' , ['as' => 'importfile', 'uses' => 'RateController@importrate']);
    });
});
?>