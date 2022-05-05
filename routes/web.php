<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AmbuController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\RepairController;
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
Route::view('/adminlog', 'adminlog');
//Auth::routes(['verify'=> true]);
Route::view('/about', 'about');
Route::view('/search_a', 'search_a');
Route::view('/search_f', 'search_f');
Route::view('/search_r', 'search_r');
Route::view('/dash', 'dash');
Route::view('/admindash', 'admindash');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::POST('/search_donor',[MainController::class, 'searchdonor']);
Route::get('/search_d',[MainController::class, 'check_reg_donor']);
Route::get('/regdonor', [MainController::class, 'check_reg_donor1']);
Route::get('/view_d',[MainController::class, 'check_reg_donor2']);
Route::get('/donor_pro', [MainController::class, 'donor2']);
Route::get('/edit_donor',[MainController::class, 'donor3']);
Route::POST('/edit_ddon',[MainController::class, 'donor4']);
Route::view('/log_ambu', 'ambu_login');
Route::view('/ambu', 'ambu_reg');
Route::POST('/reg_ambu',[AmbuController::class, 'reg']);

Route::get('user/{id}', [AmbuController::class, 'req_ambu'])->name('req_ambu');
//Route::POST('/req_ambu',[AmbuController::class, 'req']);
Route::POST('/ambulog',[AmbuController::class, 'log']);
Route::POST('/search_ambu',[AmbuController::class, 'ambulist']);
Route::POST('/admin',[AdminController::class, 'log']);


Route::get('/log_fuel', function () {
    return view('fuel_login');
});
Route::view('/fuel', 'fuel_reg');
Route::POST('/reg_fuel',[FuelController::class, 'reg']);
Route::POST('/fuellog',[FuelController::class, 'log']);


Route::get('/log_rep', function () {
    return view('repair_login');
});
Route::view('/rep', 'repair_reg');
Route::POST('/reg_rep',[RepairController::class, 'reg']);
Route::POST('/replog',[RepairController::class, 'log']);

Route::post('/registerdonor',[MainController::class, 'registerdonor']);
require __DIR__.'/auth.php';
