<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\Tool;

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
        View::composer('*', function ($view) {
            $locale = app()->getLocale();
            $localePrefix = $locale === 'en' ? '' : '/' . $locale;

            $tools = Tool::select('name', 'slug', 'category')
                ->where('is_active', true)
                ->get()
                ->map(function ($tool) use ($localePrefix) {
                    return [
                        'name' => __t($tool, 'name') ?? $tool->name,
                        'category' => $tool->category,
                        'url' => $localePrefix . '/' . $tool->slug,
                    ];
                });

            $view->with('searchableTools', $tools);
        });
    }
}
