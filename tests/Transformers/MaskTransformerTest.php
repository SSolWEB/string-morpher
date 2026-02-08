<?php

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\Transformers\MaskTransformer;

class MaskTransformerTest extends TestCase
{
    public static function paramProvider()
    {
        // input, mask pattern, expected output, optional custom map
        return [
            ['123-ABC', '123ABC', '000-AAA'],
            ['1a(2b)3c', '1a2b3c', 'N(N)N', ['N' => '[0-9][a-z]']],
            ['987-ZYX_123', '987ZYX123', '000-SSS_SSS'],
            ['abc-123', 'abc123', 'AAA-000'],
            ['ab&c1&23', 'abc123', 'SS&SS&SS'],
            ['1234-5678-9012-3456', '1234567890123456', '0000-0000-0000-0000'],
            ['2025-12-31', '20251231', 'Y-M-D', ['Y' => '\d{4}', 'M' => '\d{2}', 'D' => '\d{2}']],
            ['31/12/2025', '31122025', 'D/M/Y', ['Y' => '\d{4}', 'M' => '\d{2}', 'D' => '\d{2}']],
        ];
    }

    /**
     * @dataProvider paramProvider
     */
    public function testTransform($expected, $input, $maskPattern, $customMap = null)
    {
        $transformer = new MaskTransformer();
        $result = $transformer->transform($input, $maskPattern, $customMap);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider paramProvider
     */
    public function testFacade($expected, $input, $maskPattern, $customMap = null)
    {
        $result = SM::mask($input, $maskPattern, $customMap);
        $this->assertEquals($expected, $result);
        $this->assertInstanceOf(StringMorpherInstance::class, $result);
    }

    public function testInvalidCustomMapKeyThrows()
    {
        $this->expectException(\InvalidArgumentException::class);
        SM::mask('123', '000', ['00' => '[0-9]']);
    }
}
