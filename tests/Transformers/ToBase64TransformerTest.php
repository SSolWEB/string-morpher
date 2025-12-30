<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToBase64Transformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class ToBase64TransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToBase64Transformer();

        $randomStrings = [bin2hex(random_bytes(16)) . 'abcdef', bin2hex(random_bytes(16)) . 'abcdef'];
        $tests = [
            base64_encode($randomStrings[0]) => $randomStrings[0],
            base64_encode($randomStrings[1]) => $randomStrings[1],
            'SGVsbG8gd29ybGQ=' => 'Hello world',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $randomStrings = [bin2hex(random_bytes(16)) . 'abcdef', bin2hex(random_bytes(16)) . 'abcdef'];
        $tests = [
            base64_encode($randomStrings[0]) => [$randomStrings[0]],
            base64_encode($randomStrings[1]) => [$randomStrings[1]],
            'SGVsbG8gd29ybGQ=' => ['Hello world'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::toBase64(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
