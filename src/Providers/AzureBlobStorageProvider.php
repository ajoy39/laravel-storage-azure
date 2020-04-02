<?php

namespace LaravelAzureStorage;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\AzureBlobStorage\AzureBlobStorageAdapter;
use League\Flysystem\Filesystem;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;

class AzureBlobStorageProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/src/config.php' => config_path('azure_blob_storage.php'),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('azure-blob-storage', function ($app, $config) {
            $client = BlobRestProxy::createBlobService("DefaultEndpointsProtocol=https;AccountName={$config['account_name']};AccountKey={$config['account_key']};");
            return new Filesystem(new AzureBlobStorageAdapter($client, $config['container']));
        });
    }
}
