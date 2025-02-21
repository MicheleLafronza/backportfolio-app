<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// richiesta di tutti i progetti
Route::get('/projects', [ApiController::class, 'allProjects']);

// richiesta per un singolo progetto
Route::get('/project/{project:slug}', [ApiController::class, 'oneProject']);
