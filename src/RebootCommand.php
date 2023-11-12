<?php

namespace LaravelAddons\CommandDaemonizer;

use Illuminate\Console\Command;
use Illuminate\Contracts\Cache\Repository as CacheContract;
use Illuminate\Support\InteractsWithTime;

class RebootCommand extends Command
{
    use InteractsWithTime;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'daemonized-command:reboot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reboot daemonized commands';

    /**
     * Execute the console command.
     * and cache indefinitely
     *
     * @param CacheContract $cache
     */
    public function handle(CacheContract $cache): void
    {
        $cache->forever('laravel-lib:daemonize-command:reboot', $this->currentTime());

        $this->info('Broadcasting daemon command restart signal.');
    }
}