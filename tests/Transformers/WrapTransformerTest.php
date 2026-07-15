<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Transformers\WrapTransformer;

class WrapTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new WrapTransformer();

        $tests = [
            ['(abc)', 'abc', '(', ')'],
            ['"abc"', 'abc', '"'],
            ['[]', '', '[', ']'],
            ['abc', 'abc', '', ''],
            ['<abc>', 'abc', '<', '>'],
            ['abc', 'abc', null, null],
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
            ['(abc)', ['abc', '(', ')']],
            ['"abc"', ['abc', '"']],
            ['[abc]', ['abc', '[', ']']],
            ['abc', ['abc', '', '']],
            ['123abc123', ['abc', 123]],
            ['abc', ['abc', null]],
            ['(abc', ['abc', '(', null]],
            ['""', [null, '"']],
            ['123', ['123', null, null]],
        ];

        foreach ($tests as [$expected, $params]) {
            $actual = SM::wrap(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
