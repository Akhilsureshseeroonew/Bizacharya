<?php

use App\Http\Controllers\AssociateController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LearningHubController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SuccessStoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');

Route::get('/opportunities', [SectorController::class, 'index'])->name('opportunities.index');
Route::get('/opportunities/{sector}', [SectorController::class, 'show'])->name('opportunities.show');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/success-stories', [SuccessStoryController::class, 'index'])->name('success-stories');

Route::get('/community', [CommunityController::class, 'index'])->name('community.index');
Route::get('/community/{event}', [CommunityController::class, 'show'])->name('community.show');
Route::post('/community/{event}/register', [CommunityController::class, 'register'])->name('events.register');

Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{job}', [CareerController::class, 'show'])->name('careers.show');
Route::post('/careers/{job}/apply', [CareerController::class, 'apply'])->name('jobs.apply');
Route::post('/associates', [AssociateController::class, 'store'])->name('associates.store');

Route::get('/learning-hub', [LearningHubController::class, 'index'])->name('learning-hub.index');
Route::get('/learning-hub/{post}', [LearningHubController::class, 'show'])->name('learning-hub.blog');

Route::view('/login', 'pages.auth.login')->name('login');
Route::view('/signup', 'pages.auth.signup')->name('signup');
Route::view('/portal/entrepreneur-dashboard', 'pages.portal.entrepreneur-dashboard')->name('portal.entrepreneur');
Route::view('/portal/associate-dashboard', 'pages.portal.associate-dashboard')->name('portal.associate');
Route::view('/portal/subscriber-learning-hub', 'pages.portal.subscriber-learning-hub')->name('portal.learning-hub');
