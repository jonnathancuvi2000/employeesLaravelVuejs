<?php

use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DeparmentController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// user
Route::resource('users',UserController::class); // users is the name that we use to call the controller, and its methos, from anywhere of the code 
// country 
Route::resource('countries',CountryController::class);
// states 
Route::resource('states',StateController::class);
// departments 
Route::resource('departments',DeparmentController::class);
// cities 
Route::resource('cities',CityController::class);
// user password
Route::post('users/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');
// we use this to call index from employees folder, with any path it can be 'hola' or 'employees' does not matter   
Route::get('{any}',function(){
    return view('employees.index'); // from index file we called the component, that is created with vue code  
})->where('any','.*');



