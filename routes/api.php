<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getHabits', [HabitsController::class, 'getHabits']);
Route::get('/getCategories', [CategoryController::class, 'getCategories']);
Route::get('/getHabit/{id}', [HabitsController::class, 'getHabit']);


Route::post('/addHabit', [HabitsController::class, 'store']);
Route::post('/editHabit/{id}', [HabitsController::class, 'update']);
Route::get('/deleteHabit/{id}', [HabitsController::class, 'destroy']);

Route::get('/getHabitEvents/{id}', [CalendarController::class, 'getHabitEvents']);
Route::post('/addEvent', [CalendarController::class, 'store']);
