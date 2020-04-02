<?php

namespace Tests;

use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return ['LaravelAzureStorage\AzureBlobStorageProvider'];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app->useEnvironmentPath(__DIR__.'/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
        $app['config']->set('filesystems.disks.azure', [
            'driver' => 'azure-blob-storage',
            'account_name' => env('AZURE_BLOB_STTORAGE_ACCOUNT_NAME'),
            'account_key' => env('AZURE_BLOB_STORAGE_ACCOUNT_KEY'),
            'container' => env('AZURE_BLOB_STORAGE_CONTAINER')
        ]);
        
        parent::getEnvironmentSetUp($app);
    }
}