<?php

use Projects\Klinik\{
    Contracts, Models, Commands
};

return [
    "namespace"     => "Projects\Klinik",
    "service_name"  => "Klinik",
    "paths"         => [
        "local_path"   => 'app/Projects',
        "base_path"    => __DIR__.'\\..\\'
    ],
    "libs"           => [
        'migration' => 'Database/Migrations',
        'model' => 'Models',
        'controller' => 'Controllers',
        'provider' => 'Providers',
        'contract' => 'Contracts',
        'concern' => 'Concerns',
        'command' => 'Commands',
        'route' => 'Routes',
        'observer' => 'Observers',
        'policy' => 'Policies',
        'seeder' => 'Database/Seeders',
        'middleware' => 'Middleware',
        'request' => 'Requests',
        'support' => 'Supports',
        'view' => 'Views',
        'resources' => 'Resources',
        'schema' => 'Schemas',
        'facade' => 'Facades',
        'config' => 'Config',
        'import' => 'Imports',
        'data' => 'Data',
        'resource' => 'Resources',
    ],
    "packages" => [
        /*--------------------------------------------------------------------------
        * Note: The contents of the packages are started with the class base name,
        * then followed by config and others. You can be used to override default package config
        * "module-user" => [
        *       "config" => []
        * ]
        *------------------------------------------------------------------------*/
    ],
    "app" => [
        "impersonate" => [
            "storage"   => [
                "driver" => env("FILESYSTEM_DISK", 'local'),
            ],
        ],
        "contracts" => [
        ],
    ],
    "database"     => [
        "models"   => [
        ]
    ],
    "commands" => [
        Commands\SeedCommand::class,
        Commands\MigrateCommand::class,
        Commands\InstallMakeCommand::class,
        Commands\ImpersonateCacheCommand::class,
        Commands\ImpersonateMigrateCommand::class,
        Commands\ModelMakeCommand::class,
        Commands\GenerateCommand::class,
        Commands\AddTenantCommand::class,
    ],
    "encodings" => [
    ],
    "provider" => "Projects\Klinik\\Providers\\KlinikServiceProvider",
    'laravel-package-generator' => [
        'patterns'      => [
            //Lihat config/laravel-package-generator.php
            'repository' => [], 
            'project'    => [],
            
            //Lihat config/micro-tenant.php
            'group'      => [],
            'tenant'     => [],
        ]
    ]
];
