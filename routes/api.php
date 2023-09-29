<?php

use App\Http\Controllers\TareaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get("/tareas", [TareaController::class, "listarTareas"]);
    Route::get("/tareas/{d}", [TareaController::class, "listarUnaTarea"]);
    Route::post("/tareas", [TareaController::class, "crearTarea"]);
    Route::put("/tareas", [TareaController::class, "editarTarea"]);
    Route::delete("/tareas", [TareaController::class, "eliminarTarea"]);
});