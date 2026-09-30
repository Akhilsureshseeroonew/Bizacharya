<?php

namespace App\Providers;

use App\Models\Associate;
use App\Models\Enquiry;
use App\Models\EventRegistration;
use App\Models\JobApplication;
use App\Models\MenuItem;
use App\Models\Sector;
use App\Models\Service;
use App\Support\Settings;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        // Only the admin panel paginates anything (Bootstrap-based) — the public
        // site never calls paginate(), so this is safe to set globally.
        Paginator::useBootstrapFive();

        try {
            if (Schema::hasTable('settings')) {
                $this->overrideSiteConfig();
            }
        } catch (\Throwable) {
            // Database not reachable yet (e.g. during initial setup/artisan commands) — fall back to config defaults.
        }

        $this->registerNavComposer();
        $this->registerAdminSidebarComposer();
    }

    protected function overrideSiteConfig(): void
    {
        foreach (Settings::all() as $key => $value) {
            config([$key => $value]);
        }
    }

    protected function registerNavComposer(): void
    {
        $this->app['view']->composer(['partials.header', 'partials.drawer', 'partials.footer'], function (View $view) {
            try {
                $view->with([
                    'navSectors' => Sector::published()->ordered()->get(),
                    'navServices' => Service::published()->ordered()->get(),
                    'navHeaderBefore' => MenuItem::active()->menu('header')->where('position', 'before')->ordered()->get(),
                    'navHeaderAfter' => MenuItem::active()->menu('header')->where('position', 'after')->ordered()->get(),
                    'navFooterQuick' => MenuItem::active()->menu('footer_quick_links')->ordered()->get(),
                ]);
            } catch (\Throwable) {
                $view->with([
                    'navSectors' => collect(), 'navServices' => collect(),
                    'navHeaderBefore' => collect(), 'navHeaderAfter' => collect(), 'navFooterQuick' => collect(),
                ]);
            }
        });
    }

    /**
     * "New" lead counts shown as badges next to the sidebar's Leads links, so a
     * non-technical admin sees there's something to look at without first opening
     * the Dashboard. Same counts DashboardController shows on the dashboard cards.
     */
    protected function registerAdminSidebarComposer(): void
    {
        $this->app['view']->composer('admin.layout', function (View $view) {
            try {
                $view->with('sidebarNewCounts', [
                    'enquiries' => Enquiry::where('status', 'new')->count(),
                    'job-applications' => JobApplication::where('status', 'new')->count(),
                    'associates' => Associate::where('status', 'new')->count(),
                    'event-registrations' => EventRegistration::whereNull('viewed_at')->count(),
                ]);
            } catch (\Throwable) {
                $view->with('sidebarNewCounts', []);
            }
        });
    }
}
