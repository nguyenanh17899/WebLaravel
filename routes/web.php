<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\MessageController;




use Illuminate\Support\Facades\Auth;

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


Route::get('/', function(){
    return view('/index');
});
Route::get('/login', [LoginController::class,"index"]);

Route::post('login', [LoginController::class,"login"]);

Route::get('/logout',function(){
    Auth::logout();
    return view('/index');
});

Route::get('user/student', [StudentController::class,"index"]); // Hiển thị danh sách sv
Route::get('user/create', [StudentController::class,"create"]); // Thêm mới sv
Route::post('user/create', [StudentController::class,"store"]); // Xử lý thêm mới sv
Route::get('user/{id}/edit', [StudentController::class,"edit"]); // Sửa sv
Route::post('user/update', [StudentController::class,"update"]); // Xử lý sửa sv
Route::get('user/{id}/delete', [StudentController::class,"destroy"]); // Xóa sv
Route::get('user/{id}/show', [StudentController::class,"show"]); // xem sv

Route::get('user/profile/{id}',[UserController::class,"showProfile"]);
Route::get('/user/profile/{id}/edit',[UserController::class,"editProfile"]);
Route::post('/user/updateProfile/', [UserController::class,"updateProfile"]);
Route::get('/user/profile/{id}/changepass',[UserController::class,"changepassProfile"]);
Route::post('/profile/updatePwd', [UserController::class, "updatePwd"]);

Route::get('/user/teacher', [TeacherController::class,"index"]);
Route::get('user/teacher/{id}/show', [TeacherController::class,"show"]); 

Route::get('/excersize',[TaskController::class,"index"]);
Route::get('/excersize/create', [TaskController::class,"create"]);
Route::post('/upload',[TaskController::class,"upload"]);
Route::get('/excersize/{id}/listsub',[TaskController::class,"showListSub"]);

Route::get('/excersize/{id}/submit',[TaskController::class,"submit"]);
Route::post('/excersize/updateSub', [TaskController::class, "updateSubmit"]);

Route::get('/challenge', [ChallengeController::class,"index"]);
Route::get('/challenge/create',[ChallengeController::class,"create"]);
Route::post('/challenge/update',[ChallengeController::class,"update"]);
Route::get('/challenge/{id}/submit',[ChallengeController::class,"submit"]);
Route::post('/challenge/checksubmit', [ChallengeController::class, "check"]);

Route::get('/user/{id}/send_mess', [MessageController::class,"showMess"]);
Route::post('/send', [MessageController::class,"sendMess"]);
Route::get('/message/{id}/delete',[MessageController::class,"destroyMess"]);
Route::get('/message/{id}/edit',[MessageController::class,"editMess"]);
// Route::get('/message/{id}/edit',[MessageController::class,"editMess"]);

