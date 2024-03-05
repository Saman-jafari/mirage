<?php

namespace App;

use App\Services\Container;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Get the laravelIntegration container.
 *
 * @param string|null           $abstract
 * @param array<string>  $parameters
 * @param Container|null $container
 *
 * @return Container|mixed
 * @throws BindingResolutionException
 */
function laravelIntegration($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }

    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("laravelIntegration.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed        $default
 *
 * @return mixed
 * @copyright Taylor Otwell
 * @link      https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return laravelIntegration('config');
    }
    if (is_array($key)) {
        return laravelIntegration('config')->set($key);
    }

    return laravelIntegration('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array  $data
 *
 * @return string
 */
function template($file, $data = [])
{
    if (remove_action('wp_head', 'wp_enqueue_scripts', 1)) {
        wp_enqueue_scripts();
    }

    return laravelIntegration('blade')->render($file, $data);
}

function template_pure($file, $data = [])
{
    return laravelIntegration('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 *
 * @param string        $file
 * @param array<string> $data
 *
 * @return string
 * @uses \App\Services\Template\Blade::compiledPath()
 */
function template_path(string $file, array $data = []): string
{
    return laravelIntegration('blade')->compiledPath($file, $data);
}

/**
 * @param string $asset
 *
 * @return string
 */
function asset_path(string $asset): string
{
    return laravelIntegration('assets')->getUri($asset);
}

/**
 * @param array<string> $templates Possible template files
 *
 * @return array<string>
 */
function filter_templates(array $templates): array
{
    $paths         = apply_filters('laravelIntegration/filter_templates/paths', [
        'views',
        'resources/views',
        'resources/hkb-templates',
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 *
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('laravelIntegration/display_sidebar', false);

    return $display;
}

/**
 * @param        $data
 * @param        $input_string
 * @param string $ifempty
 * Checks for empty string in array given in $data
 *
 * @return string
 */
function check_for_empty_string($data, $input_string, $ifempty = '')
{

    return (isset($data[$input_string]) && !empty($data[$input_string])) ? $data[$input_string] : $ifempty;
}
