<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use GuzzleHttp\Middleware;

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


Route::get('/', [PagesController::class, 'welcome'])->name('welcome');

Route::auto('/pages', PagesController::class);


//Admin
    Route::prefix('admin/')->middleware('auth')->name('admin.')->group(function(){
        Route::get('dashboard', function(){
            return view('admin.layouts.dashboard');
        })->middleware('auth')->name('dashboard');


    Route::group(['middleware'=>['role:SuperAdmin']],function(){
        Route::resources([
            'users' => UserController::class,

        ]);

    });

    Route::group(['middleware'=>['role:SuperAdmin|Admin']],function(){
        Route::resource('messages', MessageController::class)->only('index','show','destroy');

    });


    Route::group(['middleware'=>['role:SuperAdmin|Writer|Admin']],function(){
    Route::resources([
        'categories' => CategoryController::class,
        'posts' => PostController::class,
        'tags' => TagController::class,

    ]);
});

});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




require __DIR__.'/auth.php';
