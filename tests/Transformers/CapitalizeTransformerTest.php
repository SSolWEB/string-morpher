<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\CapitalizeTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class CapitalizeTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new CapitalizeTransformer();

        $tests = [
            'The Quick Brown Fox Jumps Over The Lazy Dog' => 'the quick brown fox jumps over the lazy dog',
            'Hello World' => 'hello world',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $tests = [
            'The Quick Brown Fox Jumps Over The Lazy Dog' => ['the quick brown fox jumps over the lazy dog'],
            'Hello World' => ['hello world'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::capitalize(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
