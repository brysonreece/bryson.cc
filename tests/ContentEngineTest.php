<?php

namespace Tests;

use Illuminate\Support\Str;
use Aschmelyun\Cleaver\Engines\ContentEngine;
use Aschmelyun\Cleaver\Engines\FileEngine;

class ContentEngineTest extends TestCase
{

    /**
     * @test
     */
    public function will_return_collection_of_content_files()
    {
        $fileEngine = new FileEngine();

        $expected = 'Tightenco\Collect\Support\Collection';
        $actual = ContentEngine::generateCollection($fileEngine);

        $this->assertInstanceOf($expected, $actual);

        $actual = $actual->count();
        $expected = collect(new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($fileEngine->contentDir())
        ))
        ->filter(function ($value, $key) {
            return Str::endsWith($value->getFilename(), ['.json', '.md', '.markdown']);
        })
        ->count();

        $this->assertEquals($expected, $actual);
    }

}