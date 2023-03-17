<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\V1\ExperienceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/users')->name('users.')->group(function () {
    Route::get('/sign-up', [UserController::class, 'signUp'])->name('sign-up');
});


    Route::get('/experiences', function () {
        return view('experiences.experience');
    });

