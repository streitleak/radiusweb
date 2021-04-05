<?php
Route::get('index',[Streitleak\RadiusWeb\RadiusCDRController::class,'index']);
Route::match(['get','post'],'cdr',[Streitleak\RadiusWeb\RadiusCDRController::class,'cdr']);
?>