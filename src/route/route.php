<?php

Route::get('index',[Streitleak\RadiusWeb\RadiusCDRController::class,'index']);
Route::get('cdr',[Streitleak\RadiusWeb\RadiusCDRController::class,'cdr']);
Route::post('cdr',[Streitleak\RadiusWeb\RadiusCDRController::class,'cdr']);


?>