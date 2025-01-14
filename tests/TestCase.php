<?php

namespace Eawardie\TabManager\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Eawardie\TabManager\ServiceProviders\TabManagerServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            function (string $modelName) {
                return 'Eawardie\\TabManager\\Database\\Factories\\'.class_basename($modelName).'Factory';
            }
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            TabManagerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_tab-manager-laravel_table.php.stub';
        $migration->up();
        */
    }
}
