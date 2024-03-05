<?php

namespace App\Services\Template;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\Container as ContainerContract;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\ViewServiceProvider;

/**
 * Class BladeProvider
 */
class BladeProvider extends ViewServiceProvider
{
    /**
     * @param ContainerContract|null $container
     * @param array<string>          $config
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function __construct(?ContainerContract $container = null, array $config = [])
    {
        /** @noinspection PhpParamsInspection */
        parent::__construct($container ?: Container::getInstance());

        $this->app->bindIf('config', function () use ($config) {
            return $config;
        }, true);
    }

    /**
     * Bind required instances for the service provider.
     */
    public function register(): BladeProvider
    {
        $this->registerFilesystem();
        $this->registerEvents();
        $this->registerEngineResolver();
        $this->registerViewFinder();
        $this->registerBladeCompiler();
        $this->registerFactory();

        return $this;
    }

    /**
     * Register Filesystem
     */
    public function registerFilesystem(): BladeProvider
    {
        $this->app->bindIf('files', Filesystem::class, true);

        return $this;
    }

    /**
     * Register the events dispatcher
     */
    public function registerEvents(): BladeProvider
    {
        $this->app->bindIf('events', Dispatcher::class, true);

        return $this;
    }

    /**
     * Register the view finder implementation.
     */
    public function registerViewFinder(): BladeProvider
    {
        $this->app->bindIf('view.finder', function ($app) {
            $config     = $this->app['config'];
            $paths      = $config['view.paths'];
            $namespaces = $config['view.namespaces'];
            $finder     = new FileViewFinder($app['files'], $paths);
            array_map([$finder, 'addNamespace'], array_keys($namespaces), $namespaces);

            return $finder;
        }, true);

        return $this;
    }
}
