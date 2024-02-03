<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MessageController;


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

Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('listing', [PublicController::class, 'showListing'])->name('listing');
Route::get('testimonials', [PublicController::class, 'showTestimonials'])->name('testimonials');
Route::get('blog', [PublicController::class, 'showBlog'])->name('blog');
Route::get('about', [PublicController::class, 'showAbout'])->name('about');
Route::get('contact', [PublicController::class, 'showContact'])->name('contact');
Route::get('single/{id}', [PublicController::class, 'showSingleCar'])->name('single');
Route::post('send-message', [PublicController::class, 'sendMessage'])->name('sendMessage');

Auth::routes(['verify' => true]);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(
    ['prefix' => 'admin', 'middleware' => ['verified']],
    function () {
        Route::group(['prefix'=>'users'], function (){
            Route::get('', [UserController::class, 'index'])->name('users');
            Route::get('create', [UserController::class, 'create'])->name('createUser');
            Route::post('store', [UserController::class, 'store'])->name('storeUser');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('editUser');
            Route::post('update/{id}', [UserController::class, 'update'])->name('updateUser');
        });

        Route::group(['prefix'=>'testimonials'], function (){
            Route::get('', [TestimonialController::class, 'index'])->name('testimonial');
            Route::get('create', [TestimonialController::class, 'create'])->name('createTestimonial');
            Route::post('store', [TestimonialController::class, 'store'])->name('storeTestimonial');
            Route::get('edit/{id}', [TestimonialController::class, 'edit'])->name('editTestimonial');
            Route::post('update/{id}', [TestimonialController::class, 'update'])->name('updateTestimonial');
            Route::get('destroy/{id}', [TestimonialController::class, 'destroy'])->name('destroyTestimonial');
        });

        Route::group(['prefix'=>'messages'], function (){
            Route::get('', [MessageController::class, 'index'])->name('messages');
            Route::get('show/{id}', [MessageController::class, 'show'])->name('showMessage');
            Route::get('destroy/{id}', [MessageController::class, 'destroy'])->name('destroyMessage');
        });

        Route::group(['prefix'=>'cars'], function (){
            Route::get('', [CarController::class, 'index'])->name('cars');
            Route::get('create', [CarController::class, 'create'])->name('createCar');
            Route::post('store', [CarController::class, 'store'])->name('storeCar');
            Route::get('edit/{id}', [CarController::class, 'edit'])->name('editCar');
            Route::post('update/{id}', [CarController::class, 'update'])->name('updateCar');
            Route::get('destroy/{id}', [CarController::class, 'destroy'])->name('destroyCar');
        });

        Route::group(['prefix'=>'categories'], function (){
            Route::get('', [CategoryController::class, 'index'])->name('categories');
            Route::get('create', [CategoryController::class, 'create'])->name('createCategory');
            Route::post('store', [CategoryController::class, 'store'])->name('storeCategory');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('editCategory');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('updateCategory');
            Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('destroyCategory');
        });
    }
);
