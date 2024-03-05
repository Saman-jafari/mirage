<?php

namespace App\Services;

use Illuminate\Container\Container as BaseContainer;

/**
 * Class Container
 * https://github.com/laravel/lumen-framework/pull/1253/files
 */
class Container extends BaseContainer
{
    /**
     * The array of terminating callbacks.
     *
     * @var array<callable>
     */
    protected array $terminatingCallbacks = [];

    /**
     * Register a terminating callback with the application.
     *
     * @param callable|string $callback
     *
     * @return $this
     */
    public function terminating(callable | string $callback): self
    {
        $this->terminatingCallbacks[] = $callback;

        return $this;
    }

    /**
     * Terminate the application.
     *
     * @return void
     */
    public function terminate(): void
    {
        $index            = 0;
        $terminatingCount = count($this->terminatingCallbacks);
        while ($index < $terminatingCount) {
            $this->call($this->terminatingCallbacks[$index]);

            $index++;
        }
    }
}
