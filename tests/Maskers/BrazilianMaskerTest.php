<?php

namespace SSolWEB\StringMorpher\Tests\Maskers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\StringMorpher as SM;

class BrazilianMaskerTest extends TestCase
{
    public function testMaskBrCep()
    {
        $tests = [
            '12.345-670' => ['12345670'],
            '98.765-432' => ['98765432'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::maskBrCep(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testMaskBrCpf()
    {
        $tests = [
            '123.456.789-01' => ['12345678901'],
            '111.222.333-44' => ['11122233344'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::maskBrCpf(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testMaskBrCnpj()
    {
        $tests = [
            '12.345.678/9012-34' => ['12345678901234'],
            '11.222.333/4444-55' => ['11222333444455'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::maskBrCnpj(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testMaskBrPhone()
    {
        $tests = [
            '(11) 1234-5678' => ['1112345678'],
            '(11) 98765-4321' => ['11987654321'],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::maskBrPhone(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
