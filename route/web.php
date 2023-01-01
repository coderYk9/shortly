<?php

use App\controller\admin\AdminAuthController;
use Root\Http\Route;
use App\controller\admin\AdminController;
use App\controller\admin\OpperationController;
use App\controller\LinkController;
use App\controller\UserAuthController;
use App\controller\UserController;

Route::get('/error', function () {
   echo viewError(502);
});
Route::get('/', [UserController::class, 'index']);

//Gusetadmin to dashboard and auth
Route::prefix('auth', function () {
   Route::middleware('guestUser|guest', function () {
      Route::get('/login', [AdminAuthController::class, 'index']);
      Route::post('/login', [AdminAuthController::class, 'login']);
   });
});

// admin operation and dashboard 
Route::prefix('admin', function () {
   Route::middleware('auth', function () {
      Route::get('/dashboard', [AdminController::class, 'index']);
      Route::get('/{id}/edit', [AdminController::class, 'edite']);
      Route::post('/{id}/delete', [AdminController::class, 'delete']);
      Route::get('/store', [AdminController::class, 'store']);
      Route::get('/links', [LinkController::class, 'store']);
      Route::get('/users', [OpperationController::class, 'index']);
      Route::post('/user/{id}/delete', [OpperationController::class, 'delete']);
      Route::post('/user/{id}/update', [OpperationController::class, 'update']);
      Route::get('/user/{id}/edit', [OpperationController::class, 'edite']);
      Route::post('/links/{id}/delete', [LinkController::class, 'delete']);
      Route::post('/register', [AdminAuthController::class, 'store']);
      Route::post('/logout', [AdminAuthController::class, 'logout']);
   });
});
/*--------------------  user auth ---------------------*/

Route::middleware('userAuth', function () {
   Route::post('/links/{id}/delete', [LinkController::class, 'del']);
   Route::post('/logout', [UserAuthController::class, 'logout']);
   Route::get('/my-links', [LinkController::class, 'all']);
});
/*--------------------  user loging ---------------------*/

Route::middleware('guest|guestUser', function () {
   Route::get('/login', [UserAuthController::class, 'index']);
   Route::post('/login', [UserAuthController::class, 'login']);
   Route::post('/register', [UserAuthController::class, 'store']);
   Route::get('/register', [UserAuthController::class, 'register']);
});
/*--------------------  linck store ---------------------*/

Route::post('/link/store', [LinkController::class, 'create']);
Route::get('/link/{link}/', [LinkController::class, 'getlink']);
