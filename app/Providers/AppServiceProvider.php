<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\footer;
use App\Models\category;
use App\Models\social;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $category = category::where('status','1')->latest()->get();
        $rand_cate = category::where('status','1')->inRandomOrder()->take(12)->get();
        $site_title = 'Dokan';
        $social = social::first();
        $setting = footer::first();
        View::share([
            'category'=> $category,
            'rand_cate'=> $rand_cate,
            'site_title'=> $site_title,
            'social'=> $social,
            'setting' => $setting,
        ]);

        // Paginator
        Paginator::useBootstrapFive();
    }
}
