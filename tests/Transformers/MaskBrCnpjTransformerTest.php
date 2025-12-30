<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\MaskBrCnpjTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class MaskBrCnpjTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new MaskBrCnpjTransformer();

        $tests = [
            '12.345.678/9012-34' => '12345678901234',
            '11.222.333/4444-55' => '11222333444455',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $tests = [
            '12.345.678/9012-34' => ['12345678901234'],
            '11.222.333/4444-55' => ['11222333444455'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::maskBrCnpj(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
