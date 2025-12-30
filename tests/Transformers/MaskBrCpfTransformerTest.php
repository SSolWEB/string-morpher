<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\MaskBrCpfTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class MaskBrCpfTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new MaskBrCpfTransformer();

        $tests = [
            '123.456.789-01' => '12345678901',
            '111.222.333-44' => '11122233344',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $tests = [
            '123.456.789-01' => ['12345678901'],
            '111.222.333-44' => ['11122233344'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::maskBrCpf(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
