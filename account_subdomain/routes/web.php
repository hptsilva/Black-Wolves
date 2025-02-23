<?php

use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuildsProcessoController;
use App\Http\Controllers\MidiaProcessoController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\SignOutController;
use App\Http\Middleware\AutenticacaoAdmin;
use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Middleware\Autenticado;
use Illuminate\Support\Facades\Route;

//Rotas acessadas por qualquer usuário para configurações de conta
Route::get('/', [UserAccountController::class, 'signin'])->name('useraccount.signin')->middleware(Autenticado::class);
Route::get('/{name}', [UserAccountController::class, 'index'])->name('useraccount')->middleware(AutenticacaoMiddleware::class);
Route::get('/{name}/admin', [AdminController::class, 'admin'])->name('admin.index')->middleware(AutenticacaoAdmin::class);

Route::get('/{name}/minhas-builds/the-division-2', [UserAccountController::class, 'buildsTheDivision2'])->name('useraccount.builds.td2')->middleware(AutenticacaoMiddleware::class);
Route::get('/{name}/minhas-builds/the-division-2/adicionar/{erro?}', [UserAccountController::class, 'buildsTheDivision2Adicionar'])->name('useraccount.builds.td2.adicionar')->middleware(AutenticacaoMiddleware::class);
Route::get('/{name}/minhas-builds/the-division-2/editar/{id}', [UserAccountController::class, 'buildsTheDivision2Editar'])->name('useraccount.builds.td2.editar')->middleware(AutenticacaoMiddleware::class);
Route::post('/{name}/minhas-builds/the-division2/adicionar', [BuildsProcessoController::class, 'adicionar'])->name('useraccount.builds.td2.adicionar.post')->middleware(AutenticacaoMiddleware::class);
Route::delete('/minhas-builds/excluir/{id}', [BuildsProcessoController::class, 'excluir'])->name('builds.excluir')->middleware(AutenticacaoMiddleware::class);

Route::get('/{name}/minhas-midias/the-division-2', [UserAccountController::class, 'midiaTheDivision2'])->name('useraccount.midia.td2')->middleware(AutenticacaoMiddleware::class);
Route::get('/{name}/minhas-midias/the-division-2/adicionar/{erro?}', [UserAccountController::class, 'midiaTheDivision2Adicionar'])->name('useraccount.midia.td2.adicionar')->middleware(AutenticacaoMiddleware::class);
Route::post('/{name}/minhas-midias/the-division-2/adicionar/imagem', [MidiaProcessoController::class, 'adicionarImagem'])->name('useraccount.midia.td2.adicionar.imagem.post')->middleware(AutenticacaoMiddleware::class);
Route::post('/{name}/minhas-midias/the-division-2/adicionar/video', [MidiaProcessoController::class, 'adicionarVideo'])->name('useraccount.midia.td2.adicionar.video.post')->middleware(AutenticacaoMiddleware::class);
Route::delete('/minhas-midia/excluir/{id}', [MidiaProcessoController::class, 'excluir'])->name('midia.excluir')->middleware(AutenticacaoMiddleware::class);

Route::post('/autenticar', [UserAccountController::class, 'autenticar'])->name('useraccount.autenticar');
Route::patch('/useraccount//username', [AccountSettingsController::class, 'alterarUsername'])->name('agente.alterar.username')->middleware(AutenticacaoMiddleware::class);
Route::patch('/useraccount/password', [AccountSettingsController::class, 'alterarSenha'])->name('agente.alterar.senha')->middleware(AutenticacaoMiddleware::class);
Route::patch('/useraccount/agentname', [AccountSettingsController::class, 'alterarNome'])->name('agente.alterar.nome')->middleware(AutenticacaoMiddleware::class);
Route::patch('/useraccount/photo', [AccountSettingsController::class, 'alterarFoto'])->name('agente.alterar.foto')->middleware(AutenticacaoMiddleware::class);
Route::post('/useraccount/signout', [SignOutController::class, 'signOut'])->name('signout');