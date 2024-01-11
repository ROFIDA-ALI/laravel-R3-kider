<?php

use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\UserController;
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



Route::get('testimonialAdmin', [TestimonialsController::class, 'DashboradView'])->name('testimonialAdmin');
Route::get('editTestimonial/{id}', [TestimonialsController::class, 'edit']);

Route::get('testimonialDetail/{id}', [TestimonialsController::class, 'show'])->name('testimonialDetail');
Route::put('updateTestimonial/{id}', [TestimonialsController::class, 'update'])->name('updateTestimonial');
Route::get('deleteTestimonial/{id}', [TestimonialsController::class, 'destroy']); //soft
Route::get('trashed', [TestimonialsController::class, 'trashed'])->name('trashed');
 Route::get('restoreTestimonial/{id}', [TestimonialsController::class, 'restore']);
 Route::get('delete/{id}', [TestimonialsController::class, 'delete']); //forsedelete

 Route::get('useradmin', [UserController::class, 'index'])->name('useradmin');
 Route::get('userDetails/{id}', [UserController::class, 'show'])->name('userDetails');
 Route::get('editUser/{id}', [UserController::class, 'edit'])->name('editUser');
 Route::put('updateUser/{id}', [UserController::class, 'update'])->name('updateUser');
 Route::get('deleteUser/{id}', [UserController::class, 'destroy']); //soft
 Route::get('trashedUsers', [UserController::class, 'trashed'])->name('trashedUsers');
  Route::get('restoreUser/{id}', [UserController::class, 'restoreUser']);
  Route::get('delete/{id}', [UserController::class, 'delete']); //forsedelete