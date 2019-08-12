<?php

namespace Pingu\Info\Providers;

use Illuminate\Support\ServiceProvider;
use Pingu\Info\Console\InfoCommand;


class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    protected $commands = [
        InfoCommand::class
    ];

    public function register()
    {
        $this->commands($this->commands);
        
    }

    public function provides()
    {
        return $this->commands;
    }

}
