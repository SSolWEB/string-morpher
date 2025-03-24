<?php

namespace SSolWEB\StringMorpher\Tests\Manipulators;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\StringMorpher as SM;

class ManipulatorTest extends TestCase
{
    public function testCapitalize()
    {
        $tests = [
            'The Quick Brown Fox Jumps Over The Lazy Dog' => ['the quick brown fox jumps over the lazy dog'],
            'Hello World' => ['hello world'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::capitalize(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testFromBase64()
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

    public function testToLower()
    {
        $randomStrings = [bin2hex(random_bytes(16)) . 'ABCD', bin2hex(random_bytes(16)) . 'ABCD'];
        $tests = [
            mb_strtolower(bin2hex($randomStrings[0]), 'UTF-8') => [bin2hex($randomStrings[0])],
            mb_strtolower(bin2hex($randomStrings[1]), 'UTF-8') => [bin2hex($randomStrings[1])],
            'the quick brown fox jumps over the lazy dog' => ['THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG'],
            'hello world' => ['HeLlO wOrLd'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::toLower(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testToUpper()
    {
        $randomStrings = [bin2hex(random_bytes(16)) . 'abcdef', bin2hex(random_bytes(16)) . 'abcdef'];
        $tests = [
            mb_strtolower(bin2hex($randomStrings[0]), 'UTF-8') => [bin2hex($randomStrings[0])],
            mb_strtolower(bin2hex($randomStrings[1]), 'UTF-8') => [bin2hex($randomStrings[1])],
            'THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG' => ['the quick brown fox jumps over the lazy dog'],
            'HELLO WORLD' => ['HeLlO wOrLd'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::toUpper(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testOnlyNumbers()
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

    public function testOnlyAlpha()
    {
        $tests = [
            'abcdefghijklmnopqrstuvwxyz' => ['a1b2c3d4e5f6g7h8i9j0kl)m%n$o#p;qrstuvwxyz'],
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ' => ['A1B2C3D4E5F6G7H8I9J0KL)M%N$O#P;QRSTUVWXYZ'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::onlyAlpha(...$params);
            $this->assertEquals((string) $expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testReplace()
    {
        // case sensitive
        $tests = [
            'The quick brown dog jumps' => ['The quick brown fox jumps', 'fox', 'dog'],
            'The quick brown dog jumps over the lazy dog' =>
                ['The quick brown fox jumps over the lazy fox', 'fox', 'dog'],
            'The quick brown fox jumps over the lazy fox' =>
                ['The quick brown fox jumps over the lazy fox', 'Fox', 'dog'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::replace(...$params);
            $this->assertEquals((string) $expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
        // case insensitive
        $tests = [
            'The quick brown dog jumps' => ['The quick brown fox jumps', 'fOx', 'dog', false],
            'The quick brown dog jumps over the lazy dog' =>
                ['The quick brown fox jumps over the lazy fOx', 'Fox', 'dog', false],
            'The quick brown dog jumps over the lazy dog' =>
                ['The quick brown fox jumps over the lazy fox', 'fOx', 'dog', false],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::replace(...$params);
            $this->assertEquals((string) $expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testSub()
    {
        $tests = [
            'f6g7h8i9j0' => ['a1b2c3d4e5f6g7h8i9j0kl)m%n$o#p;qrstuvwxyz', 10, 10],
            'ef' => ['abcdef', -2],
            'cde' => ['abcdef', 2, -1],
            'cde' => ['abcdef', -4, -1],
            '' => ['abcdef', 4, -4],
            'lo wo' => ['Hello world', 3, 5],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::sub(...$params);
            $this->assertEquals((string) $expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testToBase64()
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

    public function testTrim()
    {
        $tests = [
            'Hello world' => [' Hello world '],
            'Hello world' => [' Hello world ', ' '],
            'Hello world' => [' Hello world ', ' \n\r\t\v\0'],
            'Hello world' => [' Hello world ', ' \n\r\t\v\0'],
            ' Hello world ' => [' Hello world ', '\n\r\t\v\0'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::trim(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testLtrim()
    {
        $tests = [
            'Hello world ' => [' Hello world '],
            'Hello world ' => [' Hello world ', ' '],
            'Hello world ' => [' Hello world ', ' \n\r\t\v\0'],
            'Hello world ' => [' Hello world ', ' \n\r\t\v\0'],
            ' Hello world ' => [' Hello world ', '\n\r\t\v\0'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::ltrim(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testRtrim()
    {
        $tests = [
            ' Hello world' => [' Hello world '],
            ' Hello world' => [' Hello world ', ' '],
            ' Hello world' => [' Hello world ', ' \n\r\t\v\0'],
            ' Hello world' => [' Hello world ', ' \n\r\t\v\0'],
            ' Hello world ' => [' Hello world ', '\n\r\t\v\0'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::rtrim(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testWithoutSpaces()
    {
        $tests = [
            'Thequickbrownfoxjumpsoverthelazydog' => ['The quick brown fox jumps over the lazy dog'],
            'ab1234567890' => ['ab 123 456 789 0'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::withoutSpaces(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
