<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'viewLogin'])->name('view.login');

Route::controller(AuthController::class)->prefix('/no-auth')->group(function () {
    Route::post('/store-login', 'login')->name('store.login');
});

Route::middleware('auth')->prefix('/auth')->group(function () {
    Route::get('/dashboard', function () {
        $countUser = 2;
        $countMOA = 2;
        $countMOU = 2;
        $countIA = 2;
        return view('dashboard', array(
            // 'countUser' => count($countUser),
            // 'countMOA' => count($countMOA),
            // 'countMOU' => count($countMOU),
            // 'countIA' => count($countIA),
            'menu' => '1234567890',
        ));})->name('dashboard');

    Route::controller(DocumentController::class)->prefix('/document')->group(function () {

    });
});
