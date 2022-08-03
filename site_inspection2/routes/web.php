<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
    return view('auth.login');
});

//Account
Route::post('/auth/save',[MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout',[MainController::class, 'logout'])->name('auth.logout');

//Inspection
Route::post('/inspection/save',[MainController::class, 'InspectionSave'])->name('inspection.save');



Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login',[MainController::class, 'login'])->name('auth.login');
    Route::get('/auth/register',[MainController::class, 'register'])->name('auth.register');

    //Manager
    Route::get('/dashboard',[MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/register',[MainController::class, 'RegisterInspector'])->name('register');
    Route::get('/inspections',[MainController::class, 'AllInspections'])->name('inspections');
    
    //Inspector
    Route::get('/inspection-form',[MainController::class, 'FormInspector'])->name('form');
    Route::get('/all-inspection',[MainController::class, 'AllInspections'])->name('inspections');
    

});
