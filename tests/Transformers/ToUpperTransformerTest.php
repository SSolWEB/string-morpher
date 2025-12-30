<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToUpperTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class ToUpperTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToUpperTransformer();

        $randomStrings = [bin2hex(random_bytes(16)) . 'abcdef', bin2hex(random_bytes(16)) . 'abcdef'];
        $tests = [
            mb_strtoupper(bin2hex($randomStrings[0]), 'UTF-8') => bin2hex($randomStrings[0]),
            mb_strtoupper(bin2hex($randomStrings[1]), 'UTF-8') => bin2hex($randomStrings[1]),
            'THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG' => 'the quick brown fox jumps over the lazy dog',
            'HELLO WORLD' => 'HeLlO wOrLd',
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
            mb_strtoupper(bin2hex($randomStrings[0]), 'UTF-8') => [bin2hex($randomStrings[0])],
            mb_strtoupper(bin2hex($randomStrings[1]), 'UTF-8') => [bin2hex($randomStrings[1])],
            'THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG' => ['the quick brown fox jumps over the lazy dog'],
            'HELLO WORLD' => ['HeLlO wOrLd'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::toUpper(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
