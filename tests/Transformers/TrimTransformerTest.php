<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\TrimTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class TrimTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new TrimTransformer();

        $tests = [
            ['Hello world', ' Hello world '],
            ['Hello world', ' Hello world ', ' '],
            ['Hello world', ' Hello world ', ' \n\r\t\v\0'],
            [' Hello world ', ' Hello world ', '\n\r\t\v\0'],
        ];

        foreach ($tests as $test) {
            $expected = array_shift($test);
            $input = array_shift($test);
            $actual = $transformer->transform($input, ...$test);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $tests = [
            'Hello world' => [' Hello world '],
            'Hello world' => [' Hello world ', ' '],
            'Hello world' => [' Hello world ', ' \n\r\t\v\0'],
            ' Hello world ' => [' Hello world ', '\n\r\t\v\0'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::trim(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
