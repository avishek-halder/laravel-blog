<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pizzactrl;
use App\Http\Controllers\Authctrl;
use App\Http\Controllers\Dashboardctrl;
use Illuminate\Foundation\Inspiring;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// });
// Route::get('/', [Pizzactrl::class, 'uploadform']);
Route::post('/fileupload', [Pizzactrl::class, 'fileupload']);

Route::get('/pizzas/{id}', [Pizzactrl::class, 'index']);
Route::get('/pizza/data', [Pizzactrl::class, 'data']);
Route::get('/test', [Pizzactrl::class, 'test']);
Route::get('/getdata', [Pizzactrl::class, 'getdata'])->middleware('isdatabaseonline');
Route::get('/getpdf', [Pizzactrl::class, 'getPdf']);
Route::get('/async', [Pizzactrl::class, 'async']);
Route::get('/log', [Pizzactrl::class, 'logmsg']);
Route::get('/quote', function () {
    echo $quote = Inspiring::quote();
});

Route::get('/helper', function () {
    echo unique_str();
});
Route::get('/sendmail', [Pizzactrl::class, 'mailJobQueue']);



//Demo-Project
Route::get('/', [Dashboardctrl::class, 'index']);
Route::get('/login', [Authctrl::class, 'show'])->name('login');
Route::post('/login', [Authctrl::class, 'login']);
Route::get('registration', [Authctrl::class, 'registration'])->name('register-user');
Route::post('registration', [Authctrl::class, 'customRegistration'])->name('register.custom');
//Demo-Project


Route::middleware(['first'])->group(function () {

    Route::get('/dashboard', [Dashboardctrl::class, 'index']);
    
});

// Route::prefix('admin')->group(function () {
//     Route::get('/users', function () {
//         // Matches The "/admin/users" URL
//     });
// });