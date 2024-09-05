<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::get('/health-check', function () { return response()->json(['status' => 'ok']); });


//GET - http://127.0.0.1:8000/api/users
//GET - http://127.0.0.1:8000/api/users/[id do usuario em questão]
//POST - http://127.0.0.1:8000/api/users
//PUT - http://127.0.0.1:8000/api/users/[id do usuario em questão]
//DELETE - http://127.0.0.1:8000/api/users/[id do usuario em questão]
