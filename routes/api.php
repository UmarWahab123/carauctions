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

//Login & Register
Route::post('/register_user', [App\Http\Controllers\Auth\RegisterController::class, 'register_user']);
Route::any('/applogin', [App\Http\Controllers\Auth\LoginController::class, 'applogin']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/profile/{id}', [App\Http\Controllers\Settings\SettingsController::class, 'profile']);
Route::post('/update_profile', [App\Http\Controllers\Settings\SettingsController::class, 'update_profile']);
Route::get('/get_user/{id}', [App\Http\Controllers\Auth\LoginController::class, 'get_user']);

//Trainings
Route::any('/get_trainings/{id}', [App\Http\Controllers\Front\Training\TrainingController::class, 'get_trainings']);
Route::any('/all_training/{id}', [App\Http\Controllers\Front\Training\TrainingController::class, 'all_training']);
Route::get('/othertrainings/{id}', [App\Http\Controllers\Front\Training\TrainingController::class, 'othertrainings']);
Route::get('/frontend_trainingdetail/{id}', [App\Http\Controllers\Front\Training\TrainingController::class, 'trainingdetail']);
Route::get('/lesson_detail/{id}', [App\Http\Controllers\Front\Training\TrainingController::class, 'lesson_detail']);

//Like
Route::post('/save_like', [App\Http\Controllers\Front\Training\LikeController::class, 'save_like']);
Route::post('/dislike', [App\Http\Controllers\Front\Training\LikeController::class, 'dislike']);

//Comment
Route::post('/save_comment', [App\Http\Controllers\Front\Training\CommentController::class, 'save_comment']);

//Membership
Route::get('/get_membership', [App\Http\Controllers\Front\Membership\MembershipController::class, 'get_membership']);

//Personality Test
Route::get('/getfirstquestion/{code}',[App\Http\Controllers\Front\TestController::class, 'getfirstquestion']);
Route::post('/questionresponse', [App\Http\Controllers\Front\TestController::class, 'questionresponse']);

//Test Results
Route::get('/get_result/{id}',[App\Http\Controllers\Front\TestController::class, 'get_result']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
