<?php

namespace SSolWEB\StringMorpher\Tests\Maskers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\StringMorpher as SM;

class BrazilianMaskerTest extends TestCase
{
    public function testMaskBrCep()
    {
        $this->assertEquals(
            '12.345-67',
            SM::maskBrCep('1234567')
        );
        $this->assertEquals(
            '12.345-67',
            SM::onlyNumbers('1a2b3c4b5d6e7f')
                ->maskBrCep()
        );
    }

    public function testMaskBrCpf()
    {
        $this->assertEquals(
            '123.456.789-01',
            SM::maskBrCpf('12345678901')
        );
        $this->assertEquals(
            '123.456.789-01',
            SM::onlyNumbers('-.*&1a2b3c4d5e6f7g8h9i0j1k')
                ->maskBrCpf()
        );
    }

    public function testMaskBrCnpj()
    {
        $this->assertEquals(
            '12.345.678/9012-34',
            SM::maskBrCnpj('12345678901234')
        );
        $this->assertEquals(
            '12.345.678/9012-34',
            SM::onlyNumbers('-.*&1a2b3c4b5d6e7f8g9h0i1j2k3l4')
                ->maskBrCnpj()
        );
    }

    public function testMaskBrPhone()
    {
        // Test for 8-digit number
        $this->assertEquals(
            '(11) 1234-5678',
            SM::maskBrPhone('1112345678')
        );
        $this->assertEquals(
            '(11) 1234-5678',
            SM::onlyNumbers('-.*&111a2b3c4b5d6e7f8g')
                ->maskBrPhone()
        );
        // Test for 9-digit number
        $this->assertEquals(
            '(11) 98765-4321',
            SM::maskBrPhone('11987654321')
        );
        $this->assertEquals(
            '(11) 98765-4321',
            SM::onlyNumbers('-.*&11a9b8c7d6e5f4g3h2i1j')
                ->maskBrPhone()
        );
    }
}
