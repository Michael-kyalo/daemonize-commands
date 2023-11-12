<?php

namespace LaravelLib\DaemonizeCommands;

use Illuminate\Support\ServiceProvider;
use LaravelAddons\CommandDaemonizer\RebootCommand;
class DeamonizeCommandsServiceProvider extends ServiceProvider{
       /**
     * boot services post-registration
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                [
                    RebootCommand::class,
                ]
            );
        }
    }

}