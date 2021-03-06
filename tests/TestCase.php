<?php

namespace Tests;

use Aschmelyun\Cleaver\Engines\FileEngine;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{

    const VIEW_DATA_CORRECT = [
        'view' => 'layouts.test',
        'path' => '/test-correct',
        'title' => 'This is a test',
        'mix' => [
            "/js/app.js" => "/dist/js/app.js",
            "/css/app.css" => "/dist/css/app.css"
        ]
    ];

    const VIEW_DATA_INCORRECT = [
        'path' => '/test-incorrect',
        'title' => 'This is a test',
        'mix' => [
            "/js/app.js" => "/dist/js/app.js",
            "/css/app.css" => "/dist/css/app.css"
        ]
    ];

    const TEST_VIEW_PATH = __DIR__ . '/../resources/views/layouts/test.blade.php';

    const MIX_MANIFEST_TEST_DATA = [
        "/dist/js/app.js" => "/dist/js/app.js",
        "/dist/css/app.css" => "/dist/css/app.css"
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->prepareTempResources();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        $this->destroyTempResources();
    }

    public function prepareTempResources()
    {
        file_put_contents(self::TEST_VIEW_PATH,'<h1>{{ $title }}</h1>');

        $fileEngine = new FileEngine();

        if(!is_dir(FileEngine::outputDir())) {
            mkdir(FileEngine::outputDir() . 'css', 0777, true);
        }

        if(!is_file(FileEngine::mixManifest())) {
            file_put_contents(FileEngine::mixManifest(), json_encode(self::MIX_MANIFEST_TEST_DATA));
        }
    }

    public function destroyTempResources()
    {
        unlink(self::TEST_VIEW_PATH);

        if(is_dir(FileEngine::outputDir())) {
            FileEngine::cleanOutputDir(false, []);
            rmdir(FileEngine::outputDir());
        }

        if(is_file(FileEngine::mixManifest())) {
            unlink(FileEngine::mixManifest());
        }

        if(is_file(FileEngine::contentDir() . 'test.json')) {
            unlink(FileEngine::contentDir() . 'test.json');
        }

        if(is_file(FileEngine::contentDir() . 'test.md')) {
            unlink(FileEngine::contentDir() . 'test.md');
        }
    }

}