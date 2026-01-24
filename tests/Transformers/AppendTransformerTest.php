<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\AppendTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class AppendTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new AppendTransformer();

        $tests = [
            ['Hello World', 'Hello', ' World'],
            ['Hello123', 'Hello', '123'],
            ['Hello', 'Hello', ''],
            [' World', '', ' World'],
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
            'Hello World' => ['Hello', ' World'],
            'Hello123' => ['Hello', '123'],
            'Hello' => ['Hello', ''],
            ' World' => ['', ' World'],
            'Hello1234' => ['Hello', 1234],
            'World' => [null, 'World'],
            'World ' => ['World ', null],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::append(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
