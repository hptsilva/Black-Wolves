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

Route::prefix('/{name}/minhas-builds/the-division-2')->group( function(){
    Route::middleware([AutenticacaoMiddleware::class])->group(function(){
        Route::get('/', [UserAccountController::class, 'buildsTheDivision2'])->name('useraccount.builds.td2');
        Route::get('/adicionar/{erro?}', [UserAccountController::class, 'buildsTheDivision2Adicionar'])->name('useraccount.builds.td2.adicionar');
        Route::get('/editar/{id}', [UserAccountController::class, 'buildsTheDivision2Editar'])->name('useraccount.builds.td2.editar');
        Route::post('/adicionar', [BuildsProcessoController::class, 'adicionar'])->name('useraccount.builds.td2.adicionar.post');
    });
});

Route::delete('/minhas-builds/excluir/{id}', [BuildsProcessoController::class, 'excluir'])->name('builds.excluir')->middleware(AutenticacaoMiddleware::class);

Route::prefix('/{name}/minhas-midias/the-division-2')->group( function(){
    Route::middleware([AutenticacaoMiddleware::class])->group(function(){
        Route::get('/', [UserAccountController::class, 'midiaTheDivision2'])->name('useraccount.midia.td2');
        Route::get('/adicionar/{erro?}', [UserAccountController::class, 'midiaTheDivision2Adicionar'])->name('useraccount.midia.td2.adicionar');
        Route::post('/adicionar/imagem', [MidiaProcessoController::class, 'adicionarImagem'])->name('useraccount.midia.td2.adicionar.imagem.post');
        Route::post('/adicionar/video', [MidiaProcessoController::class, 'adicionarVideo'])->name('useraccount.midia.td2.adicionar.video.post');
    });
});

Route::delete('/minhas-midias/excluir/{id}', [MidiaProcessoController::class, 'excluir'])->name('midia.excluir')->middleware(AutenticacaoMiddleware::class);

Route::post('/autenticar', [UserAccountController::class, 'autenticar'])->name('useraccount.autenticar');

Route::prefix('/useraccount')->group( function(){
    Route::middleware([AutenticacaoMiddleware::class])->group(function(){
        Route::patch('/username', [AccountSettingsController::class, 'alterarUsername'])->name('agente.alterar.username');
        Route::patch('/password', [AccountSettingsController::class, 'alterarSenha'])->name('agente.alterar.senha');
        Route::patch('/agentname', [AccountSettingsController::class, 'alterarNome'])->name('agente.alterar.nome');
        Route::patch('/photo', [AccountSettingsController::class, 'alterarFoto'])->name('agente.alterar.foto');
    });
});

Route::post('/useraccount/signout', [SignOutController::class, 'signOut'])->name('signout');