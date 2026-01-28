<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ReplaceRegexTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class ReplaceRegexTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ReplaceRegexTransformer();

        $tests = [
            'The quick brown fox jumps' => ['The quick    brown fox jumps', '/\s+/', ' '],
            'The quick brown dog jumps over the lazy dog' =>
                ['The quick brown fox jumps over the lazy fox', '/fox/', 'dog'],
            'April 1,2003' =>
                ['April 15, 2003', '/(\w+) (\d+), (\d+)/i', '$1 1,$3'],
            '2025, March 24' =>
                ['March 24, 2025', '/(\w+) (\d+), (\d+)/i', '$3, $1 $2'],
            '0he 0uick 0rown 0og 0umps' => ['The Quick Brown Dog Jumps', '/[A-Z]/', '0'],
        ];

        foreach ($tests as $expected => $test) {
            $input = array_shift($test);
            $actual = $transformer->transform($input, $test);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $tests = [
            'The quick brown fox jumps' => ['The quick    brown fox jumps', '/\s+/', ' '],
            'The quick brown dog jumps over the lazy dog' =>
                ['The quick brown fox jumps over the lazy fox', '/fox/', 'dog'],
            'April 1,2003' =>
                ['April 15, 2003', '/(\w+) (\d+), (\d+)/i', '$1 1,$3'],
            '2025, March 24' =>
                ['March 24, 2025', '/(\w+) (\d+), (\d+)/i', '$3, $1 $2'],
            '0he 0uick 0rown 0og 0umps' => ['The Quick Brown Dog Jumps', '/[A-Z]/', '0'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::replaceRegex(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
