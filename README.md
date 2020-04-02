
# Azure Blob Storage Adapter for Laravel

This package provides an easy, out of the box, service provider for using Azure Blob Storage to back Laravel's Storage service. 


### Configuration

Just the following to the disks array in config/filesystems.php 

```
 'azure' => [
            'driver' => 'azure-blob-storage',
            'account_name' => env('AZURE_BLOB_STORAGE_ACCOUNT_NAME'),
            'account_key' => env('AZURE_BLOB_STORAGE_ACCOUNT_KEY'),
            'container' => env('AZURE_BLOB_STORAGE_CONTAINER')
        ]
```

And then fill in the environment variables in your .env file or enviroment management solution 

```
AZURE_BLOB_STORAGE_ACCOUNT_NAME=
AZURE_BLOB_STORAGE_ACCOUNT_KEY=
AZURE_BLOB_STORAGE_CONTAINER=
```

You can now use `Storage::disk('azure')` right away. If you would like to set azure as the default storage disk, simply set the FILESYSTEM_DRIVER environment variable

```
FILESYSTEM_DRIVER=azure
```