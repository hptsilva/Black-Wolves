<?php

use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\BuildsController;
use App\Http\Controllers\MediaPageController;
use App\Http\Controllers\PaginaPrincipalController;
use App\Http\Controllers\SignOutController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\UserAccountController;
use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Middleware\AutenticacaoMiddlewareHome;
use App\Http\Middleware\Autenticado;
use App\Http\Middleware\NaoAutenticado;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Subdominio Account
Route::domain('account.blackwolvesclan.com.br')->group(function(){
    Route::get('/', function () {
        // ...
    })->name('account.subdomain');
});

//Página principal
Route::get('/', [PaginaPrincipalController::class, 'index'])->name('home')->middleware(AutenticacaoMiddlewareHome::class);

// Páginas de builds
Route::prefix('/builds')->group( function(){
    Route::middleware([AutenticacaoMiddleware::class])->group(function(){
        Route::get('/the-division-2/ofensivo', [BuildsController::class, 'ofensivo'])->name('ofensivo');
        Route::get('/the-division-2/defensivo', [BuildsController::class, 'defensivo'])->name('defensivo');
        Route::get('/the-division-2/utilitario', [BuildsController::class, 'utilitario'])->name('utilitario');
        Route::get('/the-division-2/raid', [BuildsController::class, 'raid'])->name('raid');
    });
});

// Páginas de midias
Route::prefix('/midia')->group( function(){
    Route::middleware([AutenticacaoMiddleware::class])->group(function(){
        Route::get('/fotos', [MediaPageController::class, 'mediaPageScreenshot'])->name('media.screenshot');
        Route::get('/videos', [MediaPageController::class, 'mediaPageVideos'])->name('media.videos');
    });
});

//Página publica para mídias
Route::get('/galeria/fotos', [GaleriaController::class, 'fotos'])->name('galeria.fotos')->middleware(NaoAutenticado::class);

// Páginas de conta
Route::get('/entrar' , [SignInController::class, 'signIn'])->name('signin')->middleware(Autenticado::class);
Route::post('/useraccount/entrar', [SignInController::class, 'autenticar'])->name('entrar.autenticar')->middleware(Autenticado::class);

// Página para se cadastrar
Route::post('/useraccount/cadastrar', [SignUpController::class, 'signUp'])->name('signup');

// Página para sair
Route::post('/useraccount/sair', [SignOutController::class, 'signOut'])->name('signout');
