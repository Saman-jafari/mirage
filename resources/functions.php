<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use App\Services\Config;
use App\Services\Container;

/**
 * Helper function for prettying up errors
 *
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$laravelIntegrationErr = function ($message, $subtitle = '', $title = ''): void {
    $title   = $title ?: __('template &rsaquo; Error', 'mirage');
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p>";
    wp_die($message, $title);
};


if (version_compare('7.1', phpversion(), '>=')) {
    $laravelIntegrationErr(__('You must be using PHP 7.1 or greater.', 'mirage'), __('Invalid PHP version', 'mirage'));
}
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $laravelIntegrationErr(__('You must be using WordPress 4.7.0 or greater.', 'mirage'), __('Invalid WordPress version', 'mirage'));
}
if (!class_exists('App\\Services\\Container')) {
    if (!file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
        $laravelIntegrationErr(
            __('You must run <code>npm run fullBuild</code> from the template directory.', 'mirage'),
            __('Autoloader not found.', 'mirage')
        );
    }
    require_once $composer;
}
array_map(function ($file) use ($laravelIntegrationErr): void {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $laravelIntegrationErr(sprintf(__('Error locating <code>%s</code> for inclusion.', 'mirage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__) . '/config/assets.php',
            'theme'  => require dirname(__DIR__) . '/config/theme.php',
            'view'   => require dirname(__DIR__) . '/config/view.php',
        ]);
    }, true);
