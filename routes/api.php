<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'notepad.general'],function (){
    Route::any('userLogin', [\App\Http\Controllers\NotePad\UserAuth::class,'userLogin']);
    Route::any('userRegister', [\App\Http\Controllers\NotePad\UserAuth::class,'userRegister']);

    Route::any('getNotes', [\App\Http\Controllers\NotePad\Notes::class,'getNotes']);
    Route::any('getNote/{username}', [\App\Http\Controllers\NotePad\Notes::class,'getNote']);
});
