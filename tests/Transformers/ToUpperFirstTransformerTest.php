<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToUpperFirstTransformer;

class ToUpperFirstTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToUpperFirstTransformer();

        $tests = [
            'The quick brown fox jumps over the lazy dog' => 'the quick brown fox jumps over the lazy dog',
            'Hello world' => 'hello world',
            'First' => 'first',
            'HeLlO wOrLd' => 'HeLlO wOrLd',
            '1hello world' => '1hello world',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
