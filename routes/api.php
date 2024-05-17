<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DialogController;
use App\Http\Controllers\MessageController;

Route::post('message/create', [MessageController::class, 'create']);
Route::get('messages/get/{id}', [MessageController::class, 'getMessagesByDialogId']);
Route::post('dialog/create', [DialogController::class, 'create']);
Route::get('dialog/landlord_tenant/get', [DialogController::class, 'getByLandlordAndTenantIds']);
