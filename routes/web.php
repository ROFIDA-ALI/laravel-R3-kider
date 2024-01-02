<?php

use App\Http\Controllers\TestimonialsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController ;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index', function () {
    return view('index');
})->name('index') ;

Route::get('about', function () {
    return view('about');
})->name('about') ;
Route::get('classes', function () {
    return view('classes');
})->name('classes') ;
Route::get('contact', function () {
    return view('contact');
})->name('contact') ;
Route::get('teachers', function () {
    return view('teachers');
})->name('teachers') ;

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin'],function(){
    Route::get('/addTestimonials', [TestimonialsController::class, 'create'])->name('addTestimonials');
   

Route::post('/testimonialStore', [TestimonialsController::class, 'store'])->name('testimonial');
Route::get('/testimonial', [TestimonialsController::class, 'index'])
->middleware('verified');

// Route::post('testimonial_mail', [TestimonialsController::class,'testimonial_mail'])->name('testimonial_mail');

});


