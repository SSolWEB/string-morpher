<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\LimitTransformer;

class LimitTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new LimitTransformer();

        $tests = [
            ['The quick brown fox jumps over', 'The quick brown fox jumps over the lazy dog', 30],
            ['The quick brown fox jumps over the lazy dog', 'The quick brown fox jumps over the lazy dog', 100],
            ['The quick brown fox jumps[...]', 'The quick brown fox jumps over the lazy dog', 30, '[...]'],
            ['abcdefghij', 'abcdefghijklmnopqrstuvwxyz', 10],
            ['ABCDEFGHIJ...', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 13, '...'],
            ['.....', 'abcdefghijklmnopqrstuvwxyz', 3, '.....'],
        ];

        foreach ($tests as $test) {
            $expected = array_shift($test);
            $input = array_shift($test);
            $actual = $transformer->transform($input, ...$test);
            $this->assertEquals($expected, $actual);
        }
    }
}
