<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\PadRTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class PadRTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new PadRTransformer();

        $tests = [
            ['The quick brown fox jumps', 'The quick brown fox jumps', 11, '1'],
            ['abc123aa', 'abc123', 8, 'a'],
            ['hello-world  ', 'hello-world', 13, ' '],
            ['hello-world  ', 'hello-world', 13],
            ['11122233344', '111222333', 11, '4'],
        ];

        foreach ($tests as $test) {
            $expected = array_shift($test);
            $input = array_shift($test);
            $actual = $transformer->transform($input, $test);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $tests = [
            'The quick brown fox jumps' => ['The quick brown fox jumps', 11, '1'],
            'abc123aa' => ['abc123', 8, 'a'],
            'hello-world  ' => ['hello-world', 13, ' '],
            'hello-world  ' => ['hello-world', 13],
            '11122233344' => ['111222333', 11, '4'],
            '11122233344' => [111222333, 11, '4'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::padR(...$params);
            $this->assertEquals((string) $expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
