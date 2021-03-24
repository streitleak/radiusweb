<?php

Route::get('index',[Streitleak\RadiusCDR\RadiusCDRController::class,'index']);
Route::get('cdr',[Streitleak\RadiusCDR\RadiusCDRController::class,'cdr']);
Route::post('cdr',[Streitleak\RadiusCDR\RadiusCDRController::class,'cdr']);


?>