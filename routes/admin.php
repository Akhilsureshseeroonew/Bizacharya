<?php

use App\Http\Controllers\Admin\AssociateAdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryAdminController;
use App\Http\Controllers\Admin\EventAdminController;
use App\Http\Controllers\Admin\EventRegistrationAdminController;
use App\Http\Controllers\Admin\JobApplicationAdminController;
use App\Http\Controllers\Admin\JobOpeningAdminController;
use App\Http\Controllers\Admin\MenuItemAdminController;
use App\Http\Controllers\Admin\PageAdminController;
use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SectorAdminController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\SuccessStoryAdminController;
use App\Http\Controllers\Admin\VideoAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('bizacharya-admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('pages', PageAdminController::class)->only(['index', 'edit', 'update']);
        Route::resource('menu-items', MenuItemAdminController::class)->except(['show']);
        Route::resource('sectors', SectorAdminController::class)->except(['show']);
        Route::resource('services', ServiceAdminController::class)->except(['show']);
        Route::resource('success-stories', SuccessStoryAdminController::class)->except(['show']);
        Route::resource('events', EventAdminController::class)->except(['show']);
        Route::resource('jobs', JobOpeningAdminController::class)->except(['show']);
        Route::resource('posts', PostAdminController::class)->except(['show']);
        Route::resource('videos', VideoAdminController::class)->except(['show']);

        Route::get('/settings', [SiteSettingsController::class, 'edit'])->name('settings.edit');
        Route::put('/settings', [SiteSettingsController::class, 'update'])->name('settings.update');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

        Route::get('/enquiries', [EnquiryAdminController::class, 'index'])->name('enquiries.index');
        Route::get('/enquiries/{enquiry}', [EnquiryAdminController::class, 'show'])->name('enquiries.show');
        Route::put('/enquiries/{enquiry}', [EnquiryAdminController::class, 'updateStatus'])->name('enquiries.update-status');

        Route::get('/event-registrations', [EventRegistrationAdminController::class, 'index'])->name('event-registrations.index');
        Route::get('/event-registrations/{event_registration}', [EventRegistrationAdminController::class, 'show'])->name('event-registrations.show');

        Route::get('/job-applications', [JobApplicationAdminController::class, 'index'])->name('job-applications.index');
        Route::get('/job-applications/{job_application}', [JobApplicationAdminController::class, 'show'])->name('job-applications.show');
        Route::put('/job-applications/{job_application}', [JobApplicationAdminController::class, 'updateStatus'])->name('job-applications.update-status');
        Route::get('/job-applications/{job_application}/cv', [JobApplicationAdminController::class, 'downloadCv'])->name('job-applications.cv');

        Route::get('/associates', [AssociateAdminController::class, 'index'])->name('associates.index');
        Route::get('/associates/{associate}', [AssociateAdminController::class, 'show'])->name('associates.show');
        Route::put('/associates/{associate}', [AssociateAdminController::class, 'updateStatus'])->name('associates.update-status');
    });
});
