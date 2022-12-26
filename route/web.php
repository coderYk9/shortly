<?php

use App\controller\admin\AdminAuthController;
use Root\Http\Route;
use App\controller\admin\AdminController;
use App\controller\AuthController;



Route::get('/error', function () {
   echo viewError('502');
});
//Gusetadmin to dashboard and auth
Route::prefix('auth', function () {
   Route::middleware('guest', function () {
      Route::get('/login', [AdminAuthController::class, 'index']);
      Route::post('/login', [AdminAuthController::class, 'login']);
   });
});

// admin operation and dashboard 
Route::prefix('admin', function () {
   Route::middleware('auth', function () {
      Route::get('/dashboard', [AdminController::class, 'index']);
      Route::post('/register', [AdminAuthController::class, 'store']);
      Route::get('/store', [AdminController::class, 'store']);
      Route::post('/logout', [AdminAuthController::class, 'logout']);
   });
});




/*-------------------- api ---------------------*/
// Route::prefix('admin', function () {
//    Route::get('/home/{id}', [PostController::class, 'index']);
//    Route::get('/auth/{id}', [PostController::class, 'index']);
// });
