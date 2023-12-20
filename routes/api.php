<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test-api', function (Request $request) {

    $param = $request->input('name');

    return response()->json([
        'status' => 'error',
        'errorCode' => 'E001',
        'message' => 'Some Error',
        'name' => $param,
    ], 422);
})->name('test-api');

Route::post('/test-api', function (Request $request) {

    $param = $request->input('name');

    return response()->json([
        'status' => 'success',
        'errorCode' => '0000',
        'message' => 'Success',
        'name' => $param,
    ], 200);
})->name('test-api');

Route::put('/test-api', function (Request $request) {

    $param = $request->input('name');

    return response()->json([
        'status' => 'success',
        'errorCode' => '0001',
        'message' => 'Success',
        'name' => $param,
    ], 200);
})->name('test-api');

Route::patch('/test-api', function (Request $request) {

    $param = $request->input('name');

    return response()->json([
        'status' => 'success',
        'errorCode' => '0002',
        'message' => 'Success',
        'name' => $param,
    ], 200);
})->name('test-api');

Route::delete('/test-api', function (Request $request) {

    $param = $request->input('name');

    return response()->json([
        'status' => 'success',
        'errorCode' => '0003',
        'message' => 'Success',
        'name' => $param,
    ], 200);
})->name('test-api');
