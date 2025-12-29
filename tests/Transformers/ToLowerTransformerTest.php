<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToLowerTransformer;

class ToLowerTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToLowerTransformer();

        $randomStrings = [bin2hex(random_bytes(16)) . 'ABCD', bin2hex(random_bytes(16)) . 'ABCD'];
        $tests = [
            mb_strtolower(bin2hex($randomStrings[0]), 'UTF-8') => bin2hex($randomStrings[0]),
            mb_strtolower(bin2hex($randomStrings[1]), 'UTF-8') => bin2hex($randomStrings[1]),
            'the quick brown fox jumps over the lazy dog' => 'THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG',
            'hello world' => 'HeLlO wOrLd',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
