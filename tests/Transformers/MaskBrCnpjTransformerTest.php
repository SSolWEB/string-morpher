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
            '7L.7D3.KW2/0001-00' => '7L7D3KW2000100',
            '7L.7D3.KW2/N6HD-18' => '7L7D3KW2N6HD18',
            'RV.SZJ.5KZ/0001-49' => 'RVSZJ5KZ000149',
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
            '7L.7D3.KW2/0001-00' => ['7L7D3KW2000100'],
            '7L.7D3.KW2/N6HD-18' => ['7L7D3KW2N6HD18'],
            'RV.SZJ.5KZ/0001-49' => ['RVSZJ5KZ000149'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::maskBrCnpj(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
