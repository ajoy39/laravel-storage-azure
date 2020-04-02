<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AzureStorageProviderTest extends TestCase
{

    public function testCanUploadFile()
    {
        dd(env('FILESYSTEM_DRIVER'));
        Storage::disk('azure')->putFileAs('test', UploadedFile::fake()->create('document.pdf', 200), 'test.txt');
        $this->assertTrue(Storage::disk('azure')->exists('test/test.txt'));
    }
}