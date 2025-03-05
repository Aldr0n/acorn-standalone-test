<?php
/**
 * Plugin Name: Arttrade Bundle
 * Description: Arttrade Bundle
 * Version: 1.0.0
 * Author: Arttrade
 * Author URI: https://arttrade.com
 * Text Domain: arttrade-bundle
 * Domain Path: /languages
 * License: GPL-2.0+
 */

use Roots\Acorn\Application;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/**
 * Set the base and app paths
 */
\add_filter('acorn/paths.base', fn() => __DIR__ );
\add_filter('acorn/paths.app', 	fn() => __DIR__ . '/app' );

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/
$app = Application::configure()
    ->withProviders([
        App\Providers\ThemeServiceProvider::class
    ])
    ->withRouting(
        web: base_path('routes/web.php'),    // Laravel-style web routes
        wordpress: true,                     // Enable WordPress request handling
    )
    ->boot();
