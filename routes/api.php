<?php

use App\Http\Controllers\api\attendanceController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\SalarieController;
use App\Http\Controllers\api\userController;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
              

route::middleware('auth:sanctum')->group(function(){
     Route::apiResource('salarie',SalarieController::class);  
     Route::apiResource('attendance',attendanceController::class);
     Route::get('/',[HomeController::class,'index']);     
});


Route::apiResource('users',userController::class);
Route::post('login',[userController::class,'login']);


















Route::get('/test', function (){
    try {
    
        //code...
        return response()->json(role::all());
    } catch (\Throwable $th) {
    dd('errore');
    }   

});