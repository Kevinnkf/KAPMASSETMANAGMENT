<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

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
        View::composer('layouts.section.sidebar', function ($view) {
            $client = new Client();
            $response = $client->request('GET', 'http://10.48.1.3:7252/api/Master');
            $body = $response->getBody();
            $content = $body->getContents();
            $data = json_decode($content, true);

            // Share the master data with the sidebar
            $view->with('sidebarData', $data);
        });

        if (env('APP_ENV') == 'development' || env('APP_ENV') == 'production') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

    }
}
