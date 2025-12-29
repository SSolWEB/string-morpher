<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\MaskBrPhoneTransformer;

class MaskBrPhoneTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new MaskBrPhoneTransformer();

        $tests = [
            '(11) 1234-5678' => '1112345678',
            '(11) 98765-4321' => '11987654321',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
