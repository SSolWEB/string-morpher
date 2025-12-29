<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\MaskBrCepTransformer;

class MaskBrCepTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new MaskBrCepTransformer();

        $tests = [
            '12.345-670' => '12345670',
            '98.765-432' => '98765432',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
