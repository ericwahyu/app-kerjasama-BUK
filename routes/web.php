<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PartnerController;
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
        $countMOA  = 2;
        $countMOU  = 2;
        $countIA   = 2;
        return view('dashboard', array(
            // 'countMOA' => count($countMOA),
            // 'countMOU' => count($countMOU),
            // 'countIA' => count($countIA),
            'menu' => '1234567890',
        ));})->name('dashboard');

    Route::controller(DocumentController::class)->prefix('/document')->group(function () {
        Route::get('/{type}', 'index')->name('index.document');
        Route::get('/create/{type}', 'create')->name('create.document');
        Route::post('/store', 'store')->name('store.document');
        Route::get('/show/{document}', 'show')->name('show.document');
        Route::get('/edit/{document}', 'edit')->name('edit.document');
        Route::post('/update/{document}', 'update')->name('update.document');
        Route::delete('/destroy/{document}', 'destroy')->name('destroy.document');
    });

    Route::get('/document-filter', [DocumentController::class, 'filter'])->name('filter.document');

    Route::controller(PartnerController::class)->prefix('/partner')->group(function () {
        route::get('/', 'index')->name('index.partner');
        route::get('/create', 'create')->name('create.partner');
        route::post('/store', 'store')->name('store.partner');
        route::get('/edit/{partner}', 'edit')->name('edit.partner');
        route::post('/update/{partner}', 'update')->name('update.partner');
        route::delete('/destroy/{partner}', 'destroy')->name('destroy.partner');
    });

    Route::get('/notification', [NotificationController::class, 'index'])->name('index.notification');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
