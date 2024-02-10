<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PartnerController;
use App\Models\Document;
use App\Models\User;
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
    Route::get('/registrasi', [AuthController::class, 'viewRegister'])->name('view.registrasi');
    Route::post('/store-registrasi', [AuthController::class, 'register'])->name('send.register');
    Route::post('/store-login', 'login')->name('store.login');
});

Route::middleware('auth')->prefix('/auth')->group(function () {
    Route::get('/dashboard', function () {
        $countUSER  = User::all();
        $countMOA  = Document::whereTypeId(1)->get();
        $countMOU  = Document::whereTypeId(2)->get();
        $countIA   = Document::whereTypeId(3)->get();
        return view('dashboard', array(
            'countUSER' => count($countUSER),
            'countMOA' => count($countMOA),
            'countMOU' => count($countMOU),
            'countIA' => count($countIA),
            'menu' => '1234567890',
        ));
    })->name('dashboard');

    Route::controller(MasterUserController::class)->prefix('/data-master-user')->middleware('role:admin')->group(function () {
        Route::get('/', 'index')->name('index.master.user');
    });

    Route::controller(DocumentController::class)->prefix('/document')->group(function () {
        Route::get('/{type}', 'index')->name('index.document');
        Route::get('/create/{type}', 'create')->name('create.document');
        Route::post('/store', 'store')->name('store.document');
        Route::get('/show/{document}', 'show')->name('show.document');
        Route::get('/edit/{document}', 'edit')->name('edit.document');
        Route::post('/update/{document}', 'update')->name('update.document');
        Route::delete('/destroy/{document}', 'destroy')->name('destroy.document');
    });

    Route::get('/document-download/{document}', [DocumentController::class, 'downloadFile'])->name('download.document');
    Route::get('/document-filter', [DocumentController::class, 'filter'])->name('filter.document');
    Route::get('/document-export', [DocumentController::class, 'export'])->name('export.document');

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
