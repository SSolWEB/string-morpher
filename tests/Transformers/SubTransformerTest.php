<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\SubTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class SubTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new SubTransformer();

        $tests = [
            ['f6g7h8i9j0', 'a1b2c3d4e5f6g7h8i9j0kl)m%n$o#p;qrstuvwxyz', 10, 10],
            ['ef', 'abcdef', -2],
            ['cde', 'abcdef', 2, -1],
            ['cde', 'abcdef', -4, -1],
            ['', 'abcdef', 4, -4],
            ['lo wo', 'Hello world', 3, 5],
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
            'f6g7h8i9j0' => ['a1b2c3d4e5f6g7h8i9j0kl)m%n$o#p;qrstuvwxyz', 10, 10],
            'ef' => ['abcdef', -2],
            'cde' => ['abcdef', 2, -1],
            'cde' => ['abcdef', -4, -1],
            '' => ['abcdef', 4, -4],
            'lo wo' => ['Hello world', 3, 5],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::sub(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
