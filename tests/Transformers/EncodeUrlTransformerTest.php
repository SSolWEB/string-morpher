<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Transformers\EncodeUrlTransformer;

class EncodeUrlTransformerTest extends TestCase
{
    public static function paramProvider(): array
    {
        return [
            ['Love%20%26%20PHP', 'Love & PHP'],
            ['user%40example.com', 'user@example.com'],
            ['Hello%20World%21%20%20%23test', 'Hello World!  #test'],
            ['Caf%C3%A9%20M%C3%BCnster', 'Café Münster'],
            ['abc-_.~123', 'abc-_.~123'],
            ['', ''],
            ['%20', ' '],
        ];
    }

    public function testTransform()
    {
        $transformer = new EncodeUrlTransformer();

        foreach ($this->paramProvider() as $args) {
            $expected = array_shift($args);
            $result = $transformer->transform(...$args);
            $this->assertEquals($expected, $result);
        }
    }

    public function testFacade()
    {
        foreach ($this->paramProvider() as $args) {
            $expected = array_shift($args);
            $result = SM::encodeUrl(...$args);
            $this->assertEquals($expected, $result);
            $this->assertInstanceOf(StringMorpherInstance::class, $result);
        }
    }

    public function testFacadeAcceptsNull()
    {
        $result = SM::encodeUrl(null);
        $this->assertEquals('', $result);
        $this->assertInstanceOf(StringMorpherInstance::class, $result);
    }

    public function testFluent()
    {
        $actual = SM::make('  Café Münster  ')
            ->trim()
            ->encodeUrl();

        $this->assertEquals('Caf%C3%A9%20M%C3%BCnster', $actual);
        $this->assertInstanceOf(StringMorpherInstance::class, $actual);
    }
}
