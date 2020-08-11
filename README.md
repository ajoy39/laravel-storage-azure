
# Azure Blob Storage Adapter for Laravel

This package provides an easy, out of the box, service provider for using Azure Blob Storage to back Laravel's Storage service. 

### Installation

```
composer require ajoy39/laravel-storage-azure
```

### Configuration

There are two options when setting up the connection, you can use the connection string provided by Azure or enter the values individually. 

#### Connection String Method

In config/filesystem.php add the following to your storage drivers array

```
'azure' => [
    'driver' => 'azure-blob-storage',
    'connection_string' => env('AZURE_BLOB_STORAGE_CONNECTION_STRING'),
    'container' => env('AZURE_BLOB_STORAGE_CONTAINER')
]
```

Fill in the values in your environment file

```
AZURE_BLOB_STORAGE_CONNECTION_STRING= 
AZURE_BLOB_STORAGE_CONTAINER=
```

#### Explicit Configuration Method

In config/filesystem.php add the following to your storage drivers array

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

If you are using Azure Gov Cloud then you will have to add the endpoint suffix to the configuration array and environment variables. This step is not necassary for the connection string method, as the connection string will already have the endpoint_suffix defined. 

```
'azure' => [
    'driver' => 'azure-blob-storage',
    'account_name' => env('AZURE_BLOB_STORAGE_ACCOUNT_NAME'),
    'account_key' => env('AZURE_BLOB_STORAGE_ACCOUNT_KEY'),
    'endpoint_suffix' => env('AZURE_BLOB_STORAGE_ENDPOINT_SUFFIX')
    'container' => env('AZURE_BLOB_STORAGE_CONTAINER')
]
```
```
AZURE_BLOB_STORAGE_ACCOUNT_NAME=
AZURE_BLOB_STORAGE_ACCOUNT_KEY=
AZURE_BLOB_STORAGE_CONTAINER=
AZURE_BLOB_STORAGE_ENDPOINT_SUFFIX
```

### Usage

You can now use `Storage::disk('azure')` right away. If you would like to set azure as the default storage disk, simply set the FILESYSTEM_DRIVER environment variable

```
FILESYSTEM_DRIVER=azure
```
