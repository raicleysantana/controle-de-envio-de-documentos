<?php

use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\TramitacaoDocumentoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteController::class, 'index']);

Route::get('/setor', [SetorController::class, 'index']);
Route::get('/setor/visualizar/{id}', [SetorController::class, 'visualizar']);
Route::get('/setor/criar', [SetorController::class, 'criar']);
Route::post('/setor', [SetorController::class, 'registrar']);
Route::delete('/setor/{id}', [SetorController::class, 'deletar']);
Route::get('/setor/editar/{id}', [SetorController::class, 'editar']);
Route::put('/setor/atualizar/{id}', [SetorController::class, 'atualizar']);

Route::get('/tipo_documento', [TipoDocumentoController::class, 'index']);
Route::get('/tipo_documento/visualizar/{id}', [TipoDocumentoController::class, 'visualizar']);
Route::get('/tipo_documento/criar', [TipoDocumentoController::class, 'criar']);
Route::post('/tipo_documento', [TipoDocumentoController::class, 'registrar']);
Route::delete('/tipo_documento/{id}', [TipoDocumentoController::class, 'deletar']);
Route::get('/tipo_documento/editar/{id}', [TipoDocumentoController::class, 'editar']);
Route::put('/tipo_documento/atualizar/{id}', [TipoDocumentoController::class, 'atualizar']);

Route::get('/documento', [DocumentoController::class, 'index']);
Route::get('/documento/visualizar/{id}', [DocumentoController::class, 'visualizar']);
Route::get('/documento/criar', [DocumentoController::class, 'criar']);
Route::post('/documento', [DocumentoController::class, 'registrar']);
Route::delete('/documento/{id}', [DocumentoController::class, 'deletar']);
Route::get('/documento/editar/{id}', [DocumentoController::class, 'editar']);
Route::get('/documento/download/{arquivo}', [DocumentoController::class, 'download']);
Route::put('/documento/atualizar/{id}', [DocumentoController::class, 'atualizar']);

Route::get('/tramitacao', [TramitacaoDocumentoController::class, 'index']);
Route::get('/tramitacao/tramitar', [TramitacaoDocumentoController::class, 'tramitar']);
Route::get('/tramitacao/setor', [TramitacaoDocumentoController::class, 'setorJson']);
Route::POST('/tramitacao', [TramitacaoDocumentoController::class, 'cadastrar']);
Route::get('/tramitacao/receber/{id}', [TramitacaoDocumentoController::class, 'receber']);
Route::put('/tramitacao/confirmar/{id}', [TramitacaoDocumentoController::class, 'confirmar']);
Route::get('/tramitacao/enviar/{id}', [TramitacaoDocumentoController::class, 'enviar']);
Route::put('/tramitacao/enviar_tramitacao/{id}', [TramitacaoDocumentoController::class, 'enviar_tramitacao']);
Route::get('/tramitacao/tramitacoes/{id}', [TramitacaoDocumentoController::class, 'tramitacoes']);
