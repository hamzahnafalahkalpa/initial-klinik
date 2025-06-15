<?php

namespace Projects\Klinik\Commands;

use Hanafalah\LaravelPackageGenerator\Commands\ModelMakeCommand as CommandsModelMakeCommand;

class ModelMakeCommand extends CommandsModelMakeCommand
{
    protected $signature = 'klinik:make-model 
                {name}
                {--pattern= : Pattern yang digunakan}
                {--class-basename= : Nama class yang digunakan}';
}