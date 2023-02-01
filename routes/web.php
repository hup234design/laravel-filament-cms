<?php

use Hup234design\FilamentCms\Http\Controllers\EventController;
use Hup234design\FilamentCms\Http\Controllers\PageController;
use Hup234design\FilamentCms\Http\Controllers\PostController;
use Hup234design\FilamentCms\Http\Controllers\ProjectController;
use Hup234design\FilamentCms\Http\Controllers\ServiceController;
use Hup234design\FilamentCms\Http\Controllers\TestimonialController;
use Hup234design\FilamentCms\Settings\CmsSettings;
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

 Route::controller(PostController::class)->group(function () {
     Route::prefix(app(CmsSettings::class)->posts_slug)->group(function() {
         Route::get('/{slug}', 'post')->name('post');
         Route::get('/', 'index')->name('posts');
     });
 });

 Route::controller(ServiceController::class)->group(function () {
     Route::prefix(app(CmsSettings::class)->services_slug)->group(function() {
         Route::get('//{slug}', 'service')->name('service');
         Route::get('/', 'index')->name('services');
     });
 });

 Route::controller(ProjectController::class)->group(function () {
     Route::prefix(app(CmsSettings::class)->projects_slug)->group(function() {
         Route::get('/{slug}', 'project')->name('project');
         Route::get('/', 'index')->name('projects');
     });
 });

 Route::controller(EventController::class)->group(function () {
     Route::prefix(app(CmsSettings::class)->events_slug)->group(function() {
         Route::get('/{slug}', 'event')->name('event');
         Route::get('/', 'index')->name('events');
     });
 });

 Route::controller(TestimonialController::class)->group(function () {
     Route::prefix(app(CmsSettings::class)->testimonials_slug)->group(function() {
         Route::get('/', 'index')->name('testimonials');
     });
 });

Route::controller(PageController::class)->group(function () {
    Route::get('/{slug}', 'page')->name('page');
    Route::get('/', 'home')->name('home');;
});
