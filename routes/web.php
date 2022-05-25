<?php

use App\Events\CarMoved;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AmbuController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\RazorpayPaymentController;
use Illuminate\Support\Facades\Broadcast;

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

Route::view('/pswd', 'change_password');
Route::view('/admindash', 'admindash'); 
Route::view('/ad_view_user', 'ad_view_u'); 

Route::view('/ad_view_donor', 'ad_view_d'); 

Route::view('/ad_view_ambu', 'ad_view_ambu'); 
Route::view('/ad_view_fuel', 'ad_view_f');
Route::view('/ad_view_rep', 'ad_view_r');  
Route::view('/ad_logout', 'adminlog');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::POST('/search_donor',[MainController::class, 'searchdonor']);
Route::POST('/chng_pswd',[MainController::class, 'pswd']);

Route::get('/search_d',[MainController::class, 'check_reg_donor']);
Route::get('/regdonor', [MainController::class, 'check_reg_donor1']);
Route::get('/view_d',[MainController::class, 'check_reg_donor2']);
Route::get('/donor_pro', [MainController::class, 'donor2']);
Route::get('/edit_donor',[MainController::class, 'donor3']);
Route::POST('/edit_ddon',[MainController::class, 'donor4']);
Route::view('/log_ambu', 'ambu_login');
Route::view('/ambu', 'ambu_reg');
Route::POST('/reg_ambu',[AmbuController::class, 'reg']);
Route::get('/dash_ambu', [AmbuController::class, 'dash']);
Route::get('/dash_fuel', [FuelController::class, 'dash']);


// Route::get('/pp', function () {
//     // return view('invoice');

//     $pdf = PDF::loadView('invoice');
//     return $pdf->download('invoice.pdf');

// })->name('bill');

Route::get('/pp', function () {
    // return view('invoice');
    
    $pdf = PDF::loadView('invoice')->setOptions(['defaultFont' => 'sans-serif']);
    return $pdf->download('invoice.pdf');

})->name('invoice');;

Route::get('/invoice-pdf', function () {
    // return view('invoice-pdf');

    $pdf = PDF::loadView('invoice-pdf')->setOptions(['defaultFont' => 'sans-serif']);
    return $pdf->download('invoice.pdf');
});




Route::get('/reqa/{id}', [AmbuController::class, 'req_ambu']) -> name('reqa');
//Route::POST('/req_ambu',[AmbuController::class, 'req']);
Route::POST('/ambulog',[AmbuController::class, 'log']); 
Route::POST('/search_ambu',[AmbuController::class, 'ambulist']);
Route::POST('/admin',[AdminController::class, 'log']);
Route::get('/req_ambu',[AmbuController::class, 'req_ambu1']);

Route::get('/req_ambu_p',[AmbuController::class, 'ambu_p_r']);
Route::get('/req_ambu_d',[AmbuController::class, 'ambu_d_r']);
Route::get('/req_ambu_c',[AmbuController::class, 'ambu_c_r']);


Route::get('/req_fuel_p',[FuelController::class, 'fuel_p_r']);
Route::get('/req_fuel_d',[FuelController::class, 'fuel_d_r']);
Route::get('/req_fuel_c',[FuelController::class, 'fuel_c_r']);


Route::get('/req_rep_p',[RepairController::class, 'rep_p_r']);
Route::get('/req_rep_d',[RepairController::class, 'rep_d_r']);
Route::get('/req_rep_c',[RepairController::class, 'rep_c_r']);

Route::get('/ambu_pro',[AmbuController::class, 'ambu_pro']);
//Route::get('/ambu_deactivate',[AmbuController::class, 'ambu_deactivate']);
Route::get('/ambu_logout',[AmbuController::class, 'ambu_logout']);
Route::get('/fuel_logout',[FuelController::class, 'fuel_logout']);
Route::get('/rep_logout',[RepairController::class, 'rep_logout']);

Route::get('/decline1/{id}', [AmbuController::class, 'req_decline_ambu']) -> name('decline_ambu');
Route::get('/accept1/{id}', [AmbuController::class, 'req_accept_ambu']) -> name('accept_ambu');
Route::get('/complete1/{id}', [AmbuController::class, 'req_cmplt_ambu']) -> name('cmplt_ambu');

Route::get('/decline/{id}', [FuelController::class, 'req_decline_fuel']) -> name('decline_fuel');
Route::get('/accept/{id}', [FuelController::class, 'req_accept_fuel']) -> name('accept_fuel');
Route::get('/complete/{id}', [FuelController::class, 'req_cmplt_fuel']) -> name('cmplt_fuel');


Route::get('/decline2/{id}', [RepairController::class, 'req_decline_rep']) -> name('decline_rep');
Route::get('/accept2/{id}', [RepairController::class, 'req_accept_rep']) -> name('accept_rep');
Route::get('/complete2/{id}', [RepairController::class, 'req_cmplt_rep']) -> name('cmplt_rep');


Route::view('/user','user');

Route::view('/log_fuel','fuel_login');

Route::view('/fuel', 'fuel_reg');
Route::POST('/reg_fuel',[FuelController::class, 'reg']);
Route::POST('/fuellog',[FuelController::class, 'log']);
Route::post('/update_petrol',[FuelController::class, 'petrol']);
Route::post('/update_disel',[FuelController::class, 'disel']);
Route::get('/view_ambu/{id}', [AmbuController::class, 'view_loc']) -> name('view_loc_ambu');

Route::view('/ambu_deactivate','dash_ambu_dlt');
Route::get('/view_fuel/{id}', [FuelController::class, 'view_loc']) -> name('view_loc_fuel');

Route::get('/view_rep/{id}', [RepairController::class, 'view_loc']) -> name('view_loc_rep');

Route::post('/search_fuel',[FuelController::class, 'fuelbuddy']);
Route::get('/reqf/{id}', [FuelController::class, 'req_fuel']) -> name('reqf');
Route::get('/req_fuel', [FuelController::class, 'req_fuel1']);
Route::get('/log_rep', function () {
    return view('repair_login');
});
Route::view('/rep', 'repair_reg');
Route::POST('/reg_rep',[RepairController::class, 'reg']);
Route::get('/req_rep',[RepairController::class, 'req_rep1']);
Route::POST('/replog',[RepairController::class, 'log']);
Route::get('/dash_rep', [RepairController::class, 'dash']);
Route::post('/search_repair',[RepairController::class, 'GoMech']);
Route::get('/request/{id}', [RepairController::class, 'req_rep']) -> name('reqr');
Route::post('/registerdonor',[MainController::class, 'registerdonor']);

Route::get('/success', [RazorpayPaymentController::class,'success']);
Route::post('/payment', [RazorpayPaymentController::class,'payment']);
Route::view('/paym','pay');
Route::get('/ho/{id}', [RazorpayPaymentController::class,'index'])->name('hom');
Route::post('/pay' , [RazorpayPaymentController::class,'pay']);
Route::get('/error' ,[RazorpayPaymentController::class,'error']);


require __DIR__.'/auth.php';
