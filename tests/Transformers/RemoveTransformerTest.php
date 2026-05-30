<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\RemoveTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class RemoveTransformerTest extends TestCase
{
    public function testTransformCaseSensitive()
    {
        $transformer = new RemoveTransformer();

        $tests = [
            'te ring' => ['test string', 'st'],
            'The quick brown jumps' => ['The quick brown fox jumps', 'fox '],
            'green' => ['red green blue', ['red ', ' blue']],
            'test string' => ['test string', 'St'],
        ];

        foreach ($tests as $expected => $test) {
            $actual = $transformer->transform(...$test);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testTransformCaseInsensitive()
    {
        $transformer = new RemoveTransformer();

        $tests = [
            ' ' => ['Hello HELLO', 'hello', false],
            'The quick brown jumps' => ['The quick brown FOX jumps', 'fox ', false],
            'green' => ['RED green BLUE', ['red ', ' blue'], false],
        ];

        foreach ($tests as $expected => $test) {
            $actual = $transformer->transform(...$test);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        // Case sensitive
        $tests = [
            'te ring' => ['test string', 'st'],
            'The quick brown jumps' => ['The quick brown fox jumps', 'fox '],
            'green' => ['red green blue', ['red ', ' blue']],
            'test string' => ['test string', 'St'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::remove(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }

        // Case insensitive
        $tests = [
            ' ' => ['Hello HELLO', 'hello', false],
            'The quick brown jumps' => ['The quick brown FOX jumps', 'fox ', false],
            'green' => ['RED green BLUE', ['red ', ' blue'], false],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::remove(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
