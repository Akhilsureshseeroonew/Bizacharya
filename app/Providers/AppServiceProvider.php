<?php

namespace App\Providers;

use App\Models\MenuItem;
use App\Models\Sector;
use App\Models\Service;
use App\Support\Settings;
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

        try {
            if (Schema::hasTable('settings')) {
                $this->overrideSiteConfig();
            }
        } catch (\Throwable) {
            // Database not reachable yet (e.g. during initial setup/artisan commands) — fall back to config defaults.
        }

        $this->registerNavComposer();
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
}
