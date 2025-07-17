<?php

namespace Projects\Klinik\Providers;

use Illuminate\Support\ServiceProvider;
use Projects\Klinik\Commands;

class CommandServiceProvider extends ServiceProvider
{
    protected $__commands = [
        Commands\SeedCommand::class,
        Commands\MigrateCommand::class,
        Commands\InstallMakeCommand::class,
        Commands\ImpersonateCacheCommand::class,
        Commands\ImpersonateMigrateCommand::class,
        Commands\ModelMakeCommand::class,
        Commands\GenerateCommand::class,
        Commands\AddTenantCommand::class,
    ];

    /**
     * Register the command.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(config('klinik.commands', $this->__commands));
    }

    public function provides()
    {
        return $this->__commands;
    }
}
