<?php

use Hup234design\FilamentCms\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::controller(PostController::class)->group(function () {
//     //Route::prefix(app(CmsSettings::class)->posts_slug)->group(function() {
//     Route::prefix('posts')->group(function() {
//         Route::get('/{slug}', 'post')->name('post');
//         Route::get('/', 'index')->name('posts');
//     });
// });

// Route::controller(ServiceController::class)->group(function () {
//     Route::get('services/{slug}', 'service')->name('service');
//     Route::get('services', 'index')->name('services');
// });

// Route::controller(ProjectController::class)->group(function () {
//     Route::get('projects/{slug}', 'project')->name('project');
//     Route::get('projects', 'index')->name('projects');
// });

// Route::controller(EventController::class)->group(function () {
//     Route::get('events/{slug}', 'event')->name('event');
//     Route::get('events', 'index')->name('events');
// });

// Route::controller(TestimonialController::class)->group(function () {
//     Route::get('testimonials', 'index')->name('testimonials');
// });

Route::controller(PageController::class)->group(function () {
    Route::get('/{slug}', 'page')->name('page');
    Route::get('/', 'home')->name('home');;
});
