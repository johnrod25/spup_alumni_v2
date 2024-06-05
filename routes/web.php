<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserDetailsController;
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

Route::get('/login', function () {
    return view('public.Home.login');
})->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::post('/Change-password', [LoginController::class, 'changePassword'])->name('change_password');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/register', 'public.Home.register')->name('register');
Route::get('/register-form',[HomeController::class, 'register_form'])->name('register-form');
Route::post('/register-form-submit',[HomeController::class, 'register_form_submit'])->name('register-form-submit');

Route::middleware(['auth'])->group(function () {
Route::get('/announcement/{id}', [AnnouncementController::class, 'show_announcement'])->name('show-announcement');
Route::get('/news/{id}', [NewsController::class, 'show_news'])->name('show-news');
// Route::view('/login', 'public.Home.login')->name('login');
Route::get('/announcement', [AnnouncementController::class, 'show_all_announcement'])->name('all-announcements');
Route::get('/news', [NewsController::class, 'show_all_news'])->name('all-news');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

//ALUMNI
Route::get('/admin/alumni', [UserDetailsController::class, 'index'])->name('admin-alumni');
Route::post('/admin/add-alumni', [UserDetailsController::class, 'add_alumni'])->name('add-alumni');
Route::post('/admin/edit-alumni', [UserDetailsController::class, 'edit_alumni'])->name('edit-alumni');
Route::post('/admin/update-alumni', [UserDetailsController::class, 'update_alumni'])->name('update-alumni');
Route::post('/admin/delete-alumni/{id}', [UserDetailsController::class, 'destroy_alumni'])->name('delete-alumni');

//ANNOUNCEMENTS
Route::get('/admin/announcement', [AnnouncementController::class, 'index'])->name('admin-announcement');
Route::post('/admin/add-announcement', [AnnouncementController::class, 'add_announcement'])->name('add-announcement');
Route::post('/admin/edit-announcement', [AnnouncementController::class, 'edit_announcement'])->name('edit-announcement');
Route::post('/admin/update-announcement', [AnnouncementController::class, 'update_announcement'])->name('update-announcement');
Route::post('/admin/delete-announcement/{id}', [AnnouncementController::class, 'destroy_announcement'])->name('delete-announcement');

//NEWS
Route::get('/admin/news', [NewsController::class, 'index'])->name('admin-news');
Route::post('/admin/add-news', [NewsController::class, 'add_news'])->name('add-news');
Route::post('/admin/edit-news', [NewsController::class, 'edit_news'])->name('edit-news');
Route::post('/admin/update-news', [NewsController::class, 'update_news'])->name('update-news');
Route::post('/admin/delete-news/{id}', [NewsController::class, 'destroy_news'])->name('delete-news');

//GALLERY
Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin-gallery');
Route::post('/admin/add-gallery', [GalleryController::class, 'add_gallery'])->name('add-gallery');
Route::post('/admin/edit-gallery', [GalleryController::class, 'edit_gallery'])->name('edit-gallery');
Route::post('/admin/update-gallery', [GalleryController::class, 'update_gallery'])->name('update-gallery');
Route::post('/admin/delete-gallery/{id}', [GalleryController::class, 'destroy_gallery'])->name('delete-gallery');

// Route::view('/admin/news', 'public.Admin.news')->name('admin-news');
// Route::get('/admin/gallery', 'public.Admin.gallery')->name('admin-gallery');


});
