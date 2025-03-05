<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use function Roots\bundle;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $name = 'app';

        // Enqueues all of the JS and CSS dependencies in the `app` bundle.
        add_action('wp_enqueue_scripts', function () use ($name) {
            bundle($name)->enqueue();
        }, 100);
    }
}
