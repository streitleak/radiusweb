<?php
Route::get('index',[Streitleak\RadiusWeb\RadiusCDRController::class,'index']);
Route::match(['get','post'],'cdr',[Streitleak\RadiusWeb\RadiusCDRController::class,'cdr']);
Route::match(['get','post'],'login',[Streitleak\RadiusWeb\UserController::class,'login']);
Route::get('logout',[Streitleak\RadiusWeb\UserController::class,'logout']);
Route::match(['get','post'],'resetpassword',[Streitleak\RadiusWeb\UserController::class,'resetpassword']);
?>