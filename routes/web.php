<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController as Login;
use App\Http\Controllers\Auth\RegisterController as Register;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// // });
// Route::get('/alpha', function () {
//     return view('alpha');
// });
// Route::get('/beta', function () {
//     return view('beta');
// // });
// Route::get('/', function () {
//     return view('auth.login');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::view('/', 'welcome');
//Auth::routes();
Route::middleware('web')->domain('app.phpunit.test')->group(function () {
    Route::get('/', [Login::class, 'showAdminLoginForm']);
    Route::post('/login/admin', [Login::class, 'adminLogin']);
    Route::get('/register/admin', [Register::class, 'showAdminRegisterForm']);
    Route::post('/register/admin', [Register::class, 'createAdmin'])->name('register_admin');


Auth::routes();
Route::group(['middleware' => 'auth:admin'], function () {

Route::view('/admin', 'admin');
Route::post('/send_email', [HomeController::class, 'Email_send']);
});
});


Route::middleware('web')->domain('phpunit.test')->group(function () {
Route::get('/register/client', [Register::class, 'showClientRegisterForm']);
Route::get('/', [Login::class, 'showClientLoginForm']);
Route::post('/login/client', [Login::class, 'clientLogin']);
Route::post('/register/client', [Register::class, 'createClient'])->name('register_client');
Auth::routes();
//Route::group(['middleware' => 'auth:client'], function () {
Route::view('/client', 'client');
//});
});
Route::get('/home', [HomeController::class, 'index']);


Route::post('logout', function () {
    Session()->flush();
    auth()->logout();
    return Redirect::to('/');
})->name('logout');
