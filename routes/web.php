<?php

use App\Http\Controllers\Api\V1\TinyUrlController;
use App\Http\Controllers\ArtisanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\AuthController;

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

Route::group([
    'prefix' => '/artisan',
    'controller' => ArtisanController::class
], function () {
    Route::get('/migrate', 'migrate');
    Route::get('/seed', 'seed');
    Route::get('/migrate-and-seed', 'migrateAndSeed');
    Route::get('/migrate-fresh-and-seed', 'migrateFreshAndSeed');
    Route::get('/storage-link', 'storageLink');
    Route::get('/clear', 'clear');
});

Route::get('/{tiny_url:tiny_url}', [TinyUrlController::class, 'redirect']);
