<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Transformers\UnwrapTransformer;

class UnwrapTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new UnwrapTransformer();

        $tests = [
            ['abc', '(abc)', '(', ')'],
            ['bcd', '"bcd"', '"'],
            ['', '[]', '[', ']'],
            ['cde', 'cde', '', ''],
            ['def', '<def>', '<', '>'],
            ['efh', 'efh', null, null],
            ['fhi', '(fhi]', '(', ']'],
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
            ['abc', ['(abc)', '(', ')']],
            ['bcd', ['"bcd"', '"']],
            ['cde', ['[cde]', '[', ']']],
            ['def', ['def', '', '']],
            ['efh', ['(efh]', '(', ']']],
            ['fhi', ['123fhi123', 123]],
            ['ghi', ['ghi', null]],
            ['', ['[]', '[', ']']],
            ['123', ['123', null, null]],
        ];

        foreach ($tests as [$expected, $params]) {
            $actual = SM::unwrap(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
