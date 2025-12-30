<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\FromBase64Transformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class FromBase64TransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new FromBase64Transformer();

        $randomStrings = [bin2hex(random_bytes(16)), bin2hex(random_bytes(16))];
        $tests = [
            bin2hex($randomStrings[0]) => base64_encode(bin2hex($randomStrings[0])),
            bin2hex($randomStrings[1]) => base64_encode(bin2hex($randomStrings[1])),
            'Hello world' => 'SGVsbG8gd29ybGQ=',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $randomStrings = [bin2hex(random_bytes(16)), bin2hex(random_bytes(16))];
        $tests = [
            bin2hex($randomStrings[0]) => [base64_encode(bin2hex($randomStrings[0]))],
            bin2hex($randomStrings[1]) => [base64_encode(bin2hex($randomStrings[1]))],
            'Hello world' => ['SGVsbG8gd29ybGQ='],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::fromBase64(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
