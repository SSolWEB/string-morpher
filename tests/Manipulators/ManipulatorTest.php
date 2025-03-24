<?php

namespace SSolWEB\StringMorpher\Tests\Manipulators;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\StringMorpher as SM;

class ManipulatorTest extends TestCase
{
    public function testCapitalize()
    {
        $this->assertEquals(
            'The Quick Brown Fox Jumps Over The Lazy Dog',
            SM::capitalize('the quick brown fox jumps over the lazy dog')
        );
        $this->assertEquals(
            'The Quick Brown Fox Jumps Over The Lazy Dog',
            SM::make('the quick brown fox jumps over the lazy dog')->capitalize()
        );
    }

    public function testFromBase64()
    {
        $content = bin2hex(random_bytes(16));
        $base64 = base64_encode($content);
        $this->assertEquals(
            base64_decode($base64),
            SM::fromBase64($base64)
        );
        $this->assertEquals(
            base64_decode($base64),
            SM::make($base64)->fromBase64()
        );
        // hard coded test
        $this->assertEquals(
            'Hello world',
            SM::fromBase64('SGVsbG8gd29ybGQ=')
        );
        $this->assertEquals(
            'Hello world',
            SM::make('SGVsbG8gd29ybGQ=')->fromBase64()
        );
    }

    public function testToLower()
    {
        $content = bin2hex(random_bytes(16)) . 'ABCDEF';
        $this->assertEquals(
            mb_strtolower($content, 'UTF-8'),
            SM::toLower($content)
        );
        $this->assertEquals(
            mb_strtolower($content, 'UTF-8'),
            SM::make($content)->toLower()
        );
        // hard coded test
        $this->assertEquals(
            'hello world',
            SM::toLower('HeLlO wOrLd')
        );
        $this->assertEquals(
            'hello world',
            SM::make('HeLlO wOrLd')->toLower()
        );
    }

    public function testToUpper()
    {
        $content = bin2hex(random_bytes(16)) . 'abcdef';
        $this->assertEquals(
            mb_strtoupper($content, 'UTF-8'),
            SM::toUpper($content)
        );
        $this->assertEquals(
            mb_strtoupper($content, 'UTF-8'),
            SM::make($content)->toUpper()
        );
        // hard coded test
        $this->assertEquals(
            'HELLO WORLD',
            SM::toUpper('HeLlO wOrLd')
        );
        $this->assertEquals(
            'HELLO WORLD',
            SM::make('HeLlO wOrLd')->toUpper()
        );
    }

    public function testOnlyNumbers()
    {
        $this->assertEquals(
            '1234567890',
            SM::onlyNumbers('1a2b3c4!5#6$7^8&9*0')
        );
        $this->assertEquals(
            '1234567890',
            SM::make('1a2b3c4!5#6$7^8&9*0')->onlyNumbers()
        );
    }

    public function testOnlyAlpha()
    {
        // test lower case
        $this->assertEquals(
            'abcdefghijklmnopqrstuvwxyz',
            SM::onlyAlpha('a1b2c3d4e5f6g7h8i9j0kl)m%n$o#p;qrstuvwxyz')
        );
        $this->assertEquals(
            'abcdefghijklmnopqrstuvwxyz',
            SM::make('a1b2c3d4e5f6g7h8i9j0kl)m%n$o#p;qrstuvwxyz')->onlyAlpha()
        );
        // test upper case
        $this->assertEquals(
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            SM::onlyAlpha('A1B2C3D4E5F6G7H8I9J0KL)M%N$O#P;QRSTUVWXYZ')
        );
        $this->assertEquals(
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            SM::make('A1B2C3D4E5F6G7H8I9J0KL)M%N$O#P;QRSTUVWXYZ')->onlyAlpha()
        );
    }

    public function testSub()
    {
        $this->assertEquals(
            'f6g7h8i9j0',
            SM::sub('a1b2c3d4e5f6g7h8i9j0kl)m%n$o#p;qrstuvwxyz', 10, 10)
        );
        $this->assertEquals(
            'F6G7H8I9J0',
            SM::make('A1B2C3D4E5F6G7H8I9J0KL)M%N$O#P;QRSTUVWXYZ')
                ->sub(10, 10)
        );
        // negative offset
        $this->assertEquals(
            'ef',
            SM::sub("abcdef", -2)
        );
        $this->assertEquals(
            'EF',
            SM::make('ABCDEF')
                ->sub(-2)
        );
        // negative length
        $this->assertEquals(
            'cde',
            SM::sub("abcdef", 2, -1)
        );
        $this->assertEquals(
            'CDE',
            SM::make('ABCDEF')
                ->sub(2, -1)
        );
        // negative offset and length
        $this->assertEquals(
            'cde',
            SM::sub("abcdef", -4, -1)
        );
        $this->assertEquals(
            'CDE',
            SM::make('ABCDEF')
                ->sub(-4, -1)
        );
        // empty returns
        $this->assertEquals(
            '',
            SM::sub("abcdef", 4, -4)
        );
        $this->assertEquals(
            '',
            SM::make('ABCDEF')
                ->sub(4, -4)
        );
        // hard coded test
        $this->assertEquals(
            'lo wo',
            SM::sub('Hello world', 3, 5)
        );
        $this->assertEquals(
            'lo wo',
            SM::make('Hello world', 3, 5)->sub(3, 5)
        );
    }

    public function testReplace()
    {
        // case sensitive
        $this->assertEquals(
            'The quick brown dog jumps',
            SM::replace('The quick brown fox jumps', 'fox', 'dog')
        );
        $this->assertEquals(
            'The quick brown dog jumps over the lazy dog',
            SM::make('The quick brown fox jumps over the lazy fox')
                ->replace('fox', 'dog')
        );
        $this->assertEquals(
            'The quick brown fox jumps over the lazy fox',
            SM::replace('The quick brown fox jumps over the lazy fox', 'Fox', 'dog')
        );
        // case insensitive
        $this->assertEquals(
            'The quick brown dog jumps',
            SM::replace('The quick brown fox jumps', 'fOx', 'dog', false)
        );
        $this->assertEquals(
            'The quick brown dog jumps over the lazy dog',
            SM::make('The quick brown foX jumps over the lazy fOx')
                ->replace('Fox', 'dog', false)
        );
    }

    public function testToBase64()
    {
        $content = bin2hex(random_bytes(16));
        $this->assertEquals(
            base64_encode($content),
            SM::toBase64($content)
        );
        $this->assertEquals(
            base64_encode($content),
            SM::make($content)->toBase64()
        );
        // hard coded test
        $this->assertEquals(
            'SGVsbG8gd29ybGQ=',
            SM::toBase64('Hello world')
        );
        $this->assertEquals(
            'SGVsbG8gd29ybGQ=',
            SM::make('Hello world')->toBase64()
        );
    }

    public function testWithoutSpaces()
    {
        $this->assertEquals(
            'Thequickbrownfoxjumpsoverthelazydog',
            SM::withoutSpaces('The quick brown fox jumps over the lazy dog')
        );
        $this->assertEquals(
            '1234567890',
            SM::make('123 456 789 0')->withoutSpaces()
        );
    }
}
