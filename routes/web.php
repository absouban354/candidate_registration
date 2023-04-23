<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware'=>'guest'],function(){
   
    Route::get('/', [UserController::class,'register'])->name('index');
    Route::get('/register', [UserController::class,'register'])->name('register');
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [UserController::class,'store'])->name('store_user');
    Route::post('/authenticate',[UserController::class,'authenticate']);
    
});
Route::middleware('auth')->group(function(){
    Route::get('/', [UserController::class,'index'])->name('index');
    Route::get('/edit',[UserController::class,'edit'])->name('edit_profile');
    Route::post('/update',[UserController::class,'update_profile'])->name('update_profile');
    Route::post('/change_password',[UserController::class,'change_password'])->name('change_password');
    Route::post('/upload_profile_picture',[UserController::class,'upload_profile_picture'])->name('upload_profile_picture');
    Route::post('/upload_resume',[UserController::class,'upload_resume'])->name('upload_resume');
    Route::post('/logout',[UserController::class,'logout']);
});

Route::get('/assets/resumes/{userId}/{file}',AssetController::class)->name('assets');