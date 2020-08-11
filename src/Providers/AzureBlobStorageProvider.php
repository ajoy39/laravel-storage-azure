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
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('azure-blob-storage', function ($app, $config) {
            if (isset($config['connection_string'])) {
                $client = BlobRestProxy::createBlobService($config['connection_string']);
            } elseif (isset($config['endpoint_suffix'])) {
                $client = BlobRestProxy::createBlobService("DefaultEndpointsProtocol=https;AccountName={$config['account_name']};AccountKey={$config['account_key']};EndpointSuffix={$config['endpoint_suffix']}");
            } else {
                $client = BlobRestProxy::createBlobService("DefaultEndpointsProtocol=https;AccountName={$config['account_name']};AccountKey={$config['account_key']};");

            }
            return new Filesystem(new AzureBlobStorageAdapter($client, $config['container']));
        });
    }
}
