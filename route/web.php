<?php


use Root\Http\Route;
use App\controller\admin\AdminController;
use App\controller\AuthController;



Route::get('/error', function () {
   echo viewError('502');
});
//Gusetadmin to dashboard and auth
Route::prefix('auth', function () {
   Route::middleware('guest', function () {
      Route::get('/login', [AuthController::class, 'index']);
      Route::post('/login', [AuthController::class, 'login']);
      Route::get('/register', [AuthController::class, 'register']);
   });
});

// admin operation and dashboard 
Route::prefix('admin', function () {
   Route::middleware('auth', function () {
      Route::get('/dashboard', [AdminController::class, 'index']);
   });
});




/*-------------------- api ---------------------*/
// Route::prefix('admin', function () {
//    Route::get('/home/{id}', [PostController::class, 'index']);
//    Route::get('/auth/{id}', [PostController::class, 'index']);
// });
