<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\OnlyNumbersTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class OnlyNumbersTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new OnlyNumbersTransformer();

        $tests = [
            '1234567890' => '1a2b3c4!5#6$7^8&9*0',
            '0987654321' => 'the0 quick 9rown f8x 76mp5 ov4r th3 laz2 dog1',
            '42' => 'The answer is 42',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $tests = [
            '1234567890' => ['1a2b3c4!5#6$7^8&9*0'],
            '0987654321' => ['the0 quick 9rown f8x 76mp5 ov4r th3 laz2 dog1'],
            '42' => ['The answer is 42'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::onlyNumbers(...$params);
            $this->assertEquals((string) $expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
