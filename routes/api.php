<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api/v1
// Route::group(['prefix' => 'v1', 'namespace' => 'App\\Http\\Controllers\\Api\\V1'], function () {
//     Route::post('invoices/bulk', [InvoiceController::class, 'bulk'])
//     ;
//     Route::apiResource('/customers', CustomerController::class);
//     Route::apiResource('/invoices', InvoiceController::class);
// });

Route::post('/v1/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
