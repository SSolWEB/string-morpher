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
