<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\PrependTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class PrependTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new PrependTransformer();

        $tests = [
            ['WorldHello', 'Hello', 'World'],
            ['123Hello', 'Hello', '123'],
            ['Hello', 'Hello', ''],
            [' World', 'World', ' '],
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
            'WorldHello' => ['Hello', 'World'],
            '123Hello' => ['Hello', '123'],
            'Hello' => ['Hello', ''],
            ' World' => ['World', ' '],
            '123World' => ['World', 123],
            'World' => [null, 'World'],
            'World' => ['World', null],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::prepend(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
