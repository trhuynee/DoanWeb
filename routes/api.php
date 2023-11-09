<?php

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [ApiLoginController::class, 'login']);
// bắt buộc đăng nhập (trong request có kèm token hợp lệ)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('tokens', [ApiLoginController::class, 'showTokens']);
    Route::post('logout', [ApiLoginController::class, 'logout']);
    Route::post('logout/all', [ApiLoginController::class, 'logoutAll']);
    Route::post('logout/{tokenId}', [ApiLoginController::class, 'logoutById']);
    Route::get('user', function (Request $request) {
        return $request->user();
    });
    //cách 1: tạo controller mới cho api
    //Route::apiResource('products', ApiProductController::class);
    //cách 2: sửa controller cũ, thêm phần json cho api
    Route::apiResource('products', ProductController::class);
});
//nếu không có Postman thì có thể test trong console của chrome