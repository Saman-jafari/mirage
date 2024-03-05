<?php

namespace App\Services\Template;

use Closure;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container as ContainerContract;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\View\Factory as FactoryContract;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\View;
use Illuminate\View\ViewFinderInterface;

/**
 * Class BladeProvider
 *
 * @method bool exists(string $view) Determine if a given view exists.
 * @method mixed share(array|string $key, mixed $value = null)
 * @method array creator(array|string $views, Closure|string $callback)
 * @method array composer(array|string $views, Closure|string $callback)
 * @method View file(string $file, array $data = [], array $mergeData = [])
 * @method View make(string $file, array $data = [], array $mergeData = [])
 * @method View addNamespace(string $namespace, string|array $hints)
 * @method View replaceNamespace(string $namespace, string|array $hints)
 * @method ContainerContract getContainer()
 */
class Blade
{
    /** @var FactoryContract */
    protected FactoryContract $env;

    public function __construct(FactoryContract $env)
    {
        $this->env = $env;
    }

    /**
     * Get the compiler
     *
     * @return BladeCompiler
     * @throws BindingResolutionException
     */
    public function compiler(): BladeCompiler
    {
        static $engineResolver;
        if (!$engineResolver) {
            $engineResolver = $this->getContainer()->make('view.engine.resolver');
        }

        return $engineResolver->resolve('blade')->getCompiler();
    }

    /**
     * @param string        $view
     * @param array<string> $data
     * @param array<string> $mergeData
     *
     * @return string
     */
    public function render(string $view, array $data = [], array $mergeData = []): string
    {
        /** @var Filesystem $filesystem */
        $filesystem = $this->getContainer()['files'];

        return $this->{$filesystem->exists($view) ? 'file' : 'make'}($view, $data, $mergeData)->render();
    }

    /**
     * @param string        $file
     * @param array<string> $data
     * @param array<string> $mergeData
     *
     * @return string
     */
    public function compiledPath(string $file, array $data = [], array $mergeData = []): string
    {
        $rendered = $this->file($file, $data, $mergeData);
        $engine   = $rendered->getEngine();

        if (!($engine instanceof CompilerEngine)) {
            // Using PhpEngine, so just return the file
            return $file;
        }

        $compiler     = $engine->getCompiler();
        $compiledPath = $compiler->getCompiledPath($rendered->getPath());
        if ($compiler->isExpired($compiledPath)) {
            $compiler->compile($file);
        }

        return $compiledPath;
    }

    /**
     * @param string $file
     *
     * @return string
     */
    public function normalizeViewPath(string $file): string
    {
        // Convert `\` to `/`
        $view = str_replace('\\', '/', $file);

        // Add namespace to path if necessary
        $view = $this->applyNamespaceToPath($view);

        // Remove unnecessary parts of the path
        $view = str_replace(
            array_merge(
                $this->getContainer()['config']['view.paths'],
                ['.blade.php', '.php', '.css']
            ),
            '',
            $view
        );

        // Remove superfluous and leading slashes
        return ltrim(preg_replace('%//+%', '/', $view), '/');
    }

    /**
     * Convert path to view namespace
     *
     * @param string $path
     *
     * @return string
     */
    public function applyNamespaceToPath(string $path): string
    {
        /** @var ViewFinderInterface $finder */
        $finder = $this->getContainer()['view.finder'];
        if (!method_exists($finder, 'getHints')) {
            return $path;
        }
        $delimiter = $finder::HINT_PATH_DELIMITER;
        $hints     = $finder->getHints();
        $view      = array_reduce(array_keys($hints), function ($view, $namespace) use ($delimiter, $hints) {
            return str_replace($hints[$namespace], $namespace . $delimiter, $view);
        }, $path);

        return preg_replace("%{$delimiter}[\\/]*%", $delimiter, $view);
    }

    /**
     * Pass any method to the view Factory instance.
     *
     * @param string $method
     * @param array  $params
     *
     * @return mixed
     */
    public function __call(string $method, array $params)
    {
        return call_user_func_array([$this->env, $method], $params);
    }
}
