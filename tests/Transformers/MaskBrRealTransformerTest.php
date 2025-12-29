<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\MaskBrRealTransformer;

class MaskBrRealTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new MaskBrRealTransformer();

        $tests = [
            'R$ 1.975,31' => '1975.31',
            'R$ 12,76' => '12.76',
            'R$ 1.234.864,20' => '1234864,20',
            'R$ 3.432.864,00' => '3432864',
            'R$ 2.975,31' => '2975.31',
            'R$ 5.975,00' => '5975',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
