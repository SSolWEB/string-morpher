<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ReplaceTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class ReplaceTransformerTest extends TestCase
{
    public function testTransformCaseSensitive()
    {
        $transformer = new ReplaceTransformer();

        $tests = [
            'The quick brown dog jumps' => ['The quick brown fox jumps', 'fox', 'dog'],
            'The quick brown dog jumps over the lazy dog' =>
                ['The quick brown fox jumps over the lazy fox', 'fox', 'dog'],
            'The quick brown fox jumps over the lazy fox' =>
                ['The quick brown fox jumps over the lazy fox', 'Fox', 'dog'],
        ];

        foreach ($tests as $expected => $test) {
            $actual = $transformer->transform(...$test);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testTransformCaseInsensitive()
    {
        $transformer = new ReplaceTransformer();

        $tests = [
            'The quick brown dog jumps' => ['The quick brown fox jumps', 'fOx', 'dog', false],
            'The quick brown dog jumps over the lazy dog' =>
                ['The quick brown fox jumps over the lazy fOx', 'Fox', 'dog', false],
            'The quick brown dog jumps over the lazy dog' =>
                ['The quick brown fox jumps over the lazy fox', 'fOx', 'dog', false],
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
            'The quick brown dog jumps' => ['The quick brown fox jumps', 'fox', 'dog'],
            'The quick brown dog jumps over the lazy dog' =>
                ['The quick brown fox jumps over the lazy fox', 'fox', 'dog'],
            'The quick brown fox jumps over the lazy fox' =>
                ['The quick brown fox jumps over the lazy fox', 'Fox', 'dog'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::replace(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }

        // Case insensitive
        $tests = [
            'The quick brown dog jumps' => ['The quick brown fox jumps', 'fOx', 'dog', false],
            'The quick brown dog jumps over the lazy dog' =>
                ['The quick brown fox jumps over the lazy fOx', 'Fox', 'dog', false],
            'The quick brown dog jumps over the lazy dog' =>
                ['The quick brown fox jumps over the lazy fox', 'fOx', 'dog', false],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::replace(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
