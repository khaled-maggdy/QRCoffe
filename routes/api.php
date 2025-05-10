<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BranchProductController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use App\Models\BranchProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::prefix('Governorate')->group(function () {
    Route::get('/', [GovernorateController::class, 'index']);
    Route::post('/store', [GovernorateController::class, 'store']);
    Route::get('/{governorate}', [GovernorateController::class, 'show']);
    Route::put('/update', [GovernorateController::class, 'update']);
    Route::get('restore/{Governorate}',  [GovernorateController::class, 'restore']);
    Route::delete('delete/{Governorate}', [GovernorateController::class, 'delete']);
    Route::get('delete_from_trash/{Governorate}', [GovernorateController::class, 'delete_from_trash']);
    Route::get('/deleted',  [GovernorateController::class, 'trash']);
});

Route::prefix('Branch')->group(function () {
    Route::get('/', [BranchController::class, 'index']);
    Route::get('/deleted',  [BranchController::class, 'trash']);
    Route::post('/store', [BranchController::class, 'store']);
    Route::get('/{branch}', [BranchController::class, 'show']);
    Route::put('/update', [BranchController::class, 'update']);
    Route::get('restore/{branch}',  [BranchController::class, 'restore']);
    Route::delete('delete/{branch}', [BranchController::class, 'delete']);
    Route::get('delete_from_trash/{branch}', [BranchController::class, 'delete_from_trash']);
});


Route::prefix('BranchProduct')->group(function () {
    Route::get('/', [BranchProductController::class, 'index']);
    Route::get('/deleted',  [BranchProductController::class, 'trash']);
    Route::post('/store', [BranchProductController::class, 'store']);
    Route::get('/{branchProduct}', [BranchProductController::class, 'show']);
    Route::put('/update', [BranchProductController::class, 'update']);
    Route::get('restore/{branchProduct}',  [BranchProductController::class, 'restore']);
    Route::delete('delete/{branchProduct}', [BranchProductController::class, 'delete']);
    Route::get('delete_from_trash/{branchProduct}', [BranchProductController::class, 'delete_from_trash']);
});

Route::prefix('Table')->group(function () {
    Route::get('/', [TableController::class, 'index']);
    Route::post('/store', [TableController::class, 'store']);
    Route::get('/{table}', [TableController::class, 'show']);
    Route::put('/update', [TableController::class, 'update']);
    Route::get('restore/{Table}',  [TableController::class, 'restore']);
    Route::delete('delete/{Table}', [TableController::class, 'delete']);
    Route::get('delete_from_trash/{Table}', [TableController::class, 'delete_from_trash']);
    Route::get('/deleted',  [TableController::class, 'trash']);
});

Route::prefix('User')->group(function () {
    Route::post('/store', [UserController::class, 'store']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::prefix('shift')->group(function () {
    Route::post('/open', [ShiftController::class, 'openshift'])->middleware('auth:sanctum');
    Route::post('/close', [ShiftController::class, 'closeshift'])->middleware('auth:sanctum');
});
Route::prefix('order')->group(function () {
    Route::post('/store', [OrderController::class, 'store'])->middleware('auth:sanctum');
});
