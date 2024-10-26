<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BookingEventController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\AlumniController;
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

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/register', 'public.Home.register')->name('register');
Route::get('/register-form', [HomeController::class, 'register_form'])->name('register-form');
Route::post('/register-form-submit', [HomeController::class, 'register_form_submit'])->name('register-form-submit');
Route::post('/send-email', [HomeController::class, 'send_email'])->name('send-mail');

Route::get('/login', function () {
    return view('public.Home.login');
})->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/search-record', [HomeController::class, 'search_record'])->name('search-record');
Route::post('/search-record', [HomeController::class, 'search_record_submit'])->name('search-record-submit');

Route::get('/announcement/{id}', [AnnouncementController::class, 'show_announcement'])->name('show-announcement');
Route::get('/news/{id}', [NewsController::class, 'show_news'])->name('show-news');
Route::get('/announcement', [AnnouncementController::class, 'show_all_announcement'])->name('all-announcements');
Route::get('/news', [NewsController::class, 'show_all_news'])->name('all-news');
Route::post('/announcement', [AnnouncementController::class, 'show_year_announcement'])->name('select-year-announcement');
Route::post('/news', [NewsController::class, 'show_year_news'])->name('select-year-news');

// Book an event routes
Route::get('/book-event', [BookingEventController::class, 'book_event'])->name('book-event');
Route::post('/book-event', [BookingEventController::class, 'book_event_submit'])->name('book-event-submit');

// Degree routes for fetching degrees for the registration form
Route::get('/degrees', [DegreeController::class, 'getAllDegrees'])->name('degrees.all');

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

    // Alumni routes
    Route::get('/admin/alumni', [UserDetailsController::class, 'index'])->name('admin-alumni');
    Route::post('/admin/add-alumni', [UserDetailsController::class, 'add_alumni'])->name('add-alumni');
    Route::post('/admin/edit-alumni', [UserDetailsController::class, 'edit_alumni'])->name('edit-alumni');
    Route::post('/admin/update-alumni', [UserDetailsController::class, 'update_alumni'])->name('update-alumni');
    Route::post('/admin/delete-alumni/{id}', [UserDetailsController::class, 'destroy_alumni'])->name('delete-alumni');

    Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf');
    // Route::get('/view-pdf', [PDFController::class, 'viewPDF']);



    // Degree routes
    Route::get('/admin/degrees/add', [DegreeController::class, 'create'])->name('admin-add-degree');
    Route::post('/admin/degrees/store', [DegreeController::class, 'store'])->name('degrees.store');
    Route::get('/admin/degrees/manage', [DegreeController::class, 'index'])->name('admin-manage-degree');
    Route::get('/admin/degrees/edit/{id}', [DegreeController::class, 'edit'])->name('admin-edit-degree');
    Route::put('/admin/degrees/update/{id}', [DegreeController::class, 'update'])->name('degrees.update');
    Route::delete('/admin/degrees/delete/{id}', [DegreeController::class, 'destroy'])->name('degrees.destroy');

    Route::get('/fetch-degrees', [DegreeController::class, 'fetchDegrees'])->name('fetch-degrees');

    Route::get('/alumni/{id}/pdf', [AlumniController::class, 'generatePDF'])->name('alumni.generate.pdf');

    // Alumni request routes
    Route::get('/admin/alumni-request', [UserDetailsController::class, 'alumni_request'])->name('admin-alumni-request');
    Route::post('/admin/alumni-approved/{id}', [UserDetailsController::class, 'alumni_approved'])->name('admin-alumni-approved');
    Route::post('/admin/alumni-reject/{id}', [UserDetailsController::class, 'alumni_reject'])->name('admin-alumni-reject');

    // Book event routes
    Route::get('/admin/book', [BookingEventController::class, 'index'])->name('admin-book');
    Route::post('/admin/add-book', [BookingEventController::class, 'add_book'])->name('add-book');
    Route::post('/admin/edit-book', [BookingEventController::class, 'edit_book'])->name('edit-book');
    Route::post('/admin/update-book', [BookingEventController::class, 'update_book'])->name('update-book');
    Route::post('/admin/delete-book/{id}', [BookingEventController::class, 'destroy_book'])->name('delete-book');

    // Book event request routes
    Route::get('/admin/book-request', [BookingEventController::class, 'book_request'])->name('admin-book-request');
    Route::post('/admin/book-approved/{id}', [BookingEventController::class, 'book_approved'])->name('admin-book-approved');
    Route::post('/admin/book-reject/{id}', [BookingEventController::class, 'book_reject'])->name('admin-book-reject');

    // Announcement routes
    Route::get('/admin/announcement', [AnnouncementController::class, 'index'])->name('admin-announcement');
    Route::post('/admin/add-announcement', [AnnouncementController::class, 'add_announcement'])->name('add-announcement');
    Route::post('/admin/edit-announcement', [AnnouncementController::class, 'edit_announcement'])->name('edit-announcement');
    Route::post('/admin/update-announcement', [AnnouncementController::class, 'update_announcement'])->name('update-announcement');
    Route::post('/admin/delete-announcement/{id}', [AnnouncementController::class, 'destroy_announcement'])->name('delete-announcement');

    // News routes
    Route::get('/admin/news', [NewsController::class, 'index'])->name('admin-news');
    Route::post('/admin/add-news', [NewsController::class, 'add_news'])->name('add-news');
    Route::post('/admin/edit-news', [NewsController::class, 'edit_news'])->name('edit-news');
    Route::post('/admin/update-news', [NewsController::class, 'update_news'])->name('update-news');
    Route::post('/admin/delete-news/{id}', [NewsController::class, 'destroy_news'])->name('delete-news');

    // Gallery routes
    Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin-gallery');
    Route::post('/admin/add-gallery', [GalleryController::class, 'add_gallery'])->name('add-gallery');
    Route::post('/admin/edit-gallery', [GalleryController::class, 'edit_gallery'])->name('edit-gallery');
    Route::post('/admin/update-gallery', [GalleryController::class, 'update_gallery'])->name('update-gallery');
    Route::post('/admin/delete-gallery/{id}', [GalleryController::class, 'destroy_gallery'])->name('delete-gallery');
});
