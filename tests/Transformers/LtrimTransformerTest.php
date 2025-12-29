<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\LtrimTransformer;

class LtrimTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new LtrimTransformer();

        $tests = [
            ['Hello world ', ' Hello world '],
            ['Hello world ', ' Hello world ', ' '],
            ['Hello world ', ' Hello world ', ' \n\r\t\v\0'],
            [' Hello world ', ' Hello world ', '\n\r\t\v\0'],
        ];

        foreach ($tests as $test) {
            $expected = array_shift($test);
            $input = array_shift($test);
            $actual = $transformer->transform($input, ...$test);
            $this->assertEquals($expected, $actual);
        }
    }
}
