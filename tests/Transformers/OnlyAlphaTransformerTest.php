<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\OnlyAlphaTransformer;

class OnlyAlphaTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new OnlyAlphaTransformer();

        $tests = [
            'abcdefghijklmnopqrstuvwxyz' => 'a1b2c3d4e5f6g7h8i9j0kl)m%n$o#p;qrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ' => 'A1B2C3D4E5F6G7H8I9J0KL)M%N$O#P;QRSTUVWXYZ',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
