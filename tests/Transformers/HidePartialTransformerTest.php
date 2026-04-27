<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Transformers\HidePartialTransformer;

class HidePartialTransformerTest extends TestCase
{
    public function testTransformWithDefaultMaskChar()
    {
        $transformer = new HidePartialTransformer();

        $this->assertEquals('12******90', $transformer->transform('1234567890', 2, 2));
        $this->assertEquals('A*****G', $transformer->transform('ABCDEFG', 1, 1));
        $this->assertEquals('***Z', $transformer->transform('XYYZ', 0, 1));
        $this->assertEquals('X***', $transformer->transform('XYYZ', 1, 0));
    }

    public function testTransformWithCustomMaskChar()
    {
        $transformer = new HidePartialTransformer();

        $this->assertEquals('12######90', $transformer->transform('1234567890', 2, 2, '#'));
        $this->assertEquals('A.....G', $transformer->transform('ABCDEFG', 1, 1, '.'));
    }

    public function testInputShorterThanPrefixPlusSuffixIsUnchanged()
    {
        $transformer = new HidePartialTransformer();

        $this->assertEquals('AB', $transformer->transform('AB', 2, 2));
        $this->assertEquals('AB', $transformer->transform('AB', 1, 1));
        $this->assertEquals('A', $transformer->transform('A', 1, 0));
    }

    public function testEmptyStringIsReturnedUnchanged()
    {
        $transformer = new HidePartialTransformer();

        $this->assertEquals('', $transformer->transform('', 2, 2));
    }

    public function testThrowsOnNegativePrefixOrSuffix()
    {
        $transformer = new HidePartialTransformer();

        $this->expectException(\InvalidArgumentException::class);

        $transformer->transform('hello', -1, 0);
    }

    public function testThrowsOnMultiCharMask()
    {
        $transformer = new HidePartialTransformer();

        $this->expectException(\InvalidArgumentException::class);

        $transformer->transform('hello', 1, 1, 'XX');
    }

    public function testFacadeStatic()
    {
        $result = SM::hidePartial('1234567890', 2, 2);

        $this->assertEquals('12******90', $result);
        $this->assertInstanceOf(StringMorpherInstance::class, $result);
    }

    public function testFluent()
    {
        $result = SM::make('ABCDEFG')->hidePartial(1, 1);

        $this->assertEquals('A*****G', (string) $result);
        $this->assertInstanceOf(StringMorpherInstance::class, $result);
    }

    public function testMultibyteSafe()
    {
        $transformer = new HidePartialTransformer();

        $this->assertEquals('日***字', $transformer->transform('日本語文字', 1, 1));
    }
}
