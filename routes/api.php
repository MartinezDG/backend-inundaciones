<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


use App\Http\Controllers\MunicipioController;

Route::get('/municipios', [MunicipioController::class, 'index']);
Route::get('/municipios/{id}', [MunicipioController::class, 'show']);
Route::post('/municipios', [MunicipioController::class, 'store']);
Route::put('/municipios/{id}', [MunicipioController::class, 'update']);
Route::delete('/municipios/{id}', [MunicipioController::class, 'destroy']);

use App\Http\Controllers\RolController;

Route::get('/roles', [RolController::class, 'index']);
Route::get('/roles/{id}', [RolController::class, 'show']);
Route::post('/roles', [RolController::class, 'store']);
Route::put('/roles/{id}', [RolController::class, 'update']);
Route::delete('/roles/{id}', [RolController::class, 'destroy']);

use App\Http\Controllers\EstadoReporteController;

Route::get('/estados-reporte', [EstadoReporteController::class, 'index']);
Route::get('/estados-reporte/{id}', [EstadoReporteController::class, 'show']);
Route::post('/estados-reporte', [EstadoReporteController::class, 'store']);
Route::put('/estados-reporte/{id}', [EstadoReporteController::class, 'update']);
Route::delete('/estados-reporte/{id}', [EstadoReporteController::class, 'destroy']);

use App\Http\Controllers\EstadoRefugioController;

Route::get('/estados-refugio', [EstadoRefugioController::class, 'index']);
Route::get('/estados-refugio/{id}', [EstadoRefugioController::class, 'show']);
Route::post('/estados-refugio', [EstadoRefugioController::class, 'store']);
Route::put('/estados-refugio/{id}', [EstadoRefugioController::class, 'update']);
Route::delete('/estados-refugio/{id}', [EstadoRefugioController::class, 'destroy']);

use App\Http\Controllers\NivelRiesgoController;

Route::get('/niveles-riesgo', [NivelRiesgoController::class, 'index']);
Route::get('/niveles-riesgo/{id}', [NivelRiesgoController::class, 'show']);
Route::post('/niveles-riesgo', [NivelRiesgoController::class, 'store']);
Route::put('/niveles-riesgo/{id}', [NivelRiesgoController::class, 'update']);
Route::delete('/niveles-riesgo/{id}', [NivelRiesgoController::class, 'destroy']);

use App\Http\Controllers\RefugioController;

Route::prefix('refugios')->group(function () {
    Route::get('/', [RefugioController::class, 'index']);
    Route::get('{id}', [RefugioController::class, 'show']);
    Route::post('/', [RefugioController::class, 'store']);
    Route::put('{id}', [RefugioController::class, 'update']);
    Route::delete('{id}', [RefugioController::class, 'destroy']);
});

use App\Http\Controllers\RefugioServicioController;

Route::prefix('servicios')->group(function () {
    Route::get('/', [RefugioServicioController::class, 'index']);
    Route::get('{id}', [RefugioServicioController::class, 'show']);
    Route::post('/', [RefugioServicioController::class, 'store']);
    Route::put('{id}', [RefugioServicioController::class, 'update']);
    Route::delete('{id}', [RefugioServicioController::class, 'destroy']);
});

use App\Http\Controllers\RefugioServicioRelController;

Route::prefix('refugio-servicios')->group(function () {
    Route::get('/', [RefugioServicioRelController::class, 'index']);
    Route::get('{id}', [RefugioServicioRelController::class, 'show']);
    Route::post('/', [RefugioServicioRelController::class, 'store']);
    Route::put('{id}', [RefugioServicioRelController::class, 'update']);
    Route::delete('{id}', [RefugioServicioRelController::class, 'destroy']);
});

use App\Http\Controllers\ZonaRiesgoController;

Route::prefix('zonas-riesgo')->group(function () {
    Route::get('/', [ZonaRiesgoController::class, 'index']);
    Route::get('{id}', [ZonaRiesgoController::class, 'show']);
    Route::post('/', [ZonaRiesgoController::class, 'store']);
    Route::put('{id}', [ZonaRiesgoController::class, 'update']);
    Route::delete('{id}', [ZonaRiesgoController::class, 'destroy']);
});

use App\Http\Controllers\ReporteInundacionController;

Route::prefix('reportes')->group(function () {
    Route::get('/', [ReporteInundacionController::class, 'index']);
    Route::get('{id}', [ReporteInundacionController::class, 'show']);
    Route::post('/', [ReporteInundacionController::class, 'store']);
    Route::put('{id}', [ReporteInundacionController::class, 'update']);
    Route::delete('{id}', [ReporteInundacionController::class, 'destroy']);
});

use App\Http\Controllers\AlcantarillaController;

Route::prefix('alcantarillas')->group(function () {
    Route::get('/', [AlcantarillaController::class, 'index']);
    Route::get('{id}', [AlcantarillaController::class, 'show']);
    Route::post('/', [AlcantarillaController::class, 'store']);
    Route::put('{id}', [AlcantarillaController::class, 'update']);
    Route::delete('{id}', [AlcantarillaController::class, 'destroy']);
});

use App\Http\Controllers\EstacionMeteorologicaController;

Route::prefix('estaciones')->group(function () {
    Route::get('/', [EstacionMeteorologicaController::class, 'index']);
    Route::get('{id}', [EstacionMeteorologicaController::class, 'show']);
    Route::post('/', [EstacionMeteorologicaController::class, 'store']);
    Route::put('{id}', [EstacionMeteorologicaController::class, 'update']);
    Route::delete('{id}', [EstacionMeteorologicaController::class, 'destroy']);
});

use App\Http\Controllers\LluviaRegistroController;

Route::prefix('lluvia-registros')->group(function () {
    Route::get('/', [LluviaRegistroController::class, 'index']);
    Route::get('{id}', [LluviaRegistroController::class, 'show']);
    Route::post('/', [LluviaRegistroController::class, 'store']);
    Route::put('{id}', [LluviaRegistroController::class, 'update']);
    Route::delete('{id}', [LluviaRegistroController::class, 'destroy']);
});

use App\Http\Controllers\ReporteVerificacionController;

Route::prefix('reportes-verificacion')->group(function () {
    Route::get('/', [ReporteVerificacionController::class, 'index']);
    Route::get('{id}', [ReporteVerificacionController::class, 'show']);
    Route::post('/', [ReporteVerificacionController::class, 'store']);
    Route::put('{id}', [ReporteVerificacionController::class, 'update']);
    Route::delete('{id}', [ReporteVerificacionController::class, 'destroy']);
});

use App\Http\Controllers\AuditoriaController;

Route::prefix('auditoria')->group(function () {
    Route::get('/', [AuditoriaController::class, 'index']);
    Route::get('{id}', [AuditoriaController::class, 'show']);
    Route::post('/', [AuditoriaController::class, 'store']);
    Route::put('{id}', [AuditoriaController::class, 'update']);
    Route::delete('{id}', [AuditoriaController::class, 'destroy']);
});

use App\Http\Controllers\AlcantarillaRegistroController;

Route::prefix('alcantarilla-registros')->group(function () {
    Route::get('/', [AlcantarillaRegistroController::class, 'index']);
    Route::get('{id}', [AlcantarillaRegistroController::class, 'show']);
    Route::post('/', [AlcantarillaRegistroController::class, 'store']);
    Route::put('{id}', [AlcantarillaRegistroController::class, 'update']);
    Route::delete('{id}', [AlcantarillaRegistroController::class, 'destroy']);
});

use App\Http\Controllers\UsuarioController;

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuarioController::class, 'index']);
    Route::get('{id}', [UsuarioController::class, 'show']);
    Route::post('/', [UsuarioController::class, 'store']);
    Route::put('{id}', [UsuarioController::class, 'update']);
    Route::delete('{id}', [UsuarioController::class, 'destroy']);
});

