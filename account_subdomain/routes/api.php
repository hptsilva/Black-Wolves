<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SignUpController;
use Illuminate\Http\Request;
use App\Http\Controllers\BuildsProcessoController;
use App\Http\Middleware\AutenticacaoMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AutenticacaoAdmin;

// Página para se cadastrar
Route::post('/useraccount/singup', [SignUpController::class, 'signUp'])->name('signup');
Route::get('/admin/contas', [AdminController::class, 'index'])->name('admin')->middleware(AutenticacaoAdmin::class);
Route::delete('/admin/contas/delete/{id}',  [AdminController::class, 'destroy'])->name('admin.delete')->middleware(AutenticacaoAdmin::class);
Route::patch('/admin/contas/resetar/{id}',  [AdminController::class, 'update'])->name('admin.resetar')->middleware(AutenticacaoAdmin::class);

Route::post('/builds/the-division-2/editar/{id}', [BuildsProcessoController::class, 'editar'])->name('builds.td2.editar')->middleware(AutenticacaoMiddleware::class);
Route::get('/builds/the-division-2/{id}', [BuildsProcessoController::class, 'preencher'])->name('builds.td2.preencher')->middleware(AutenticacaoMiddleware::class);