<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::apiResource('eventos', EventoController::class);
Route::get('/health-check', function () { return response()->json(['status' => 'ok']); });


//GET - http://127.0.0.1:8000/api/eventos
//GET - http://127.0.0.1:8000/api/eventos/[id do usuario em questão]
//POST - http://127.0.0.1:8000/api/eventos
//PUT - http://127.0.0.1:8000/api/eventos/[id do usuario em questão]
//DELETE - http://127.0.0.1:8000/api/eventos/[id do usuario em questão]
