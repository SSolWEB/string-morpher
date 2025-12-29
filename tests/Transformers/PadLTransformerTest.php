<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\PadLTransformer;

class PadLTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new PadLTransformer();

        $tests = [
            ['The quick brown fox jumps', 'The quick brown fox jumps', 11, '1'],
            ['11abc123', 'abc123', 8, '1'],
            ['  hello-world', 'hello-world', 13, ' '],
            ['  hello-world', 'hello-world', 13],
            ['01122233344', '1122233344', 11, '0'],
        ];

        foreach ($tests as $test) {
            $expected = array_shift($test);
            $input = array_shift($test);
            $actual = $transformer->transform($input, ...$test);
            $this->assertEquals($expected, $actual);
        }
    }
}
