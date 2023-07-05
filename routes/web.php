<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/database', function () {
    return view('database-config');
})->name('installer.database');

Route::post('/install', [InstallerController::class, 'install'])->name('installer.install');

Route::get('/complete', function () {
    return view('complete');
})->name('installer.complete');

