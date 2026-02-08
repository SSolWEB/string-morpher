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
        // expected, input, mask pattern, optional custom map
        return [
            ['123-ABC', '123ABC', '000-AAA'],
            ['1a(2b)3c', '1a2b3c', 'N(N)N', ['N' => '[0-9][a-z]']],
            ['987-ZYX_123', '987ZYX123', '000-SSS_SSS'],
            ['abc-123', 'abc123', 'AAA-000'],
            ['ab&c1&23', 'abc123', 'SS&SS&SS'],
            ['1234-5678-9012-3456', '1234567890123456', '0000-0000-0000-0000'],
            ['2025-12-31', '20251231', 'Y-M-D', ['Y' => '\d{4}', 'M' => '\d{2}', 'D' => '\d{2}']],
            ['31/12/2025', '31122025', 'D/M/Y', ['Y' => '\d{4}', 'M' => '\d{2}', 'D' => '\d{2}']],
            ['', '', '000-AAA'],
        ];
    }

    public function testTransform()
    {
        foreach ($this->paramProvider() as $args) {
            $expected = array_shift($args);
            $transformer = new MaskTransformer();
            $result = $transformer->transform(...$args);
            $this->assertEquals($expected, $result);
        }
    }

    public function testFacade()
    {
        foreach ($this->paramProvider() as $args) {
            $expected = array_shift($args);
            $result = SM::mask(...$args);
            $this->assertEquals($expected, $result);
            $this->assertInstanceOf(StringMorpherInstance::class, $result);
        }
    }

    public function testFacadeAcceptsNull()
    {
        $result = SM::mask(null, '000-AAA');
        $this->assertEquals('', $result);
        $this->assertInstanceOf(StringMorpherInstance::class, $result);
    }

    public function testInvalidCustomMapKeyThrows()
    {
        $this->expectException(\InvalidArgumentException::class);
        SM::mask('123', '000', ['00' => '[0-9]']);
    }
}
