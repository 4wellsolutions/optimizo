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

            // Select category_id instead of legacy category string
            $tools = Tool::select('name', 'slug', 'category_id', 'is_active')
                ->where('is_active', true)
                ->with('categoryRelation')
                ->get()
                ->map(function ($tool) use ($localePrefix) {
                    $categoryName = $tool->categoryRelation ? $tool->categoryRelation->slug : 'other';
                    return [
                        'name' => __t($tool, 'name') ?? $tool->name,
                        'category' => $categoryName, // Maintain 'category' key for frontend compatibility
                        'url' => $localePrefix . '/' . $tool->slug,
                    ];
                });

            $view->with('searchableTools', $tools);
        });
    }
}
