<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Transformers\EncodeUrlTransformer;

class EncodeUrlTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new EncodeUrlTransformer();

        $tests = [
            'Love%20%26%20PHP' => 'Love & PHP',
            'user%40example.com' => 'user@example.com',
            'Hello%20World%21%20%20%23test' => 'Hello World!  #test',
            'Caf%C3%A9%20M%C3%BCnster' => 'Café Münster',
            'abc-_.~123' => 'abc-_.~123',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $tests = [
            'Love%20%26%20PHP' => ['Love & PHP'],
            'user%40example.com' => ['user@example.com'],
            'Hello%20World%21%20%20%23test' => ['Hello World!  #test'],
            'Caf%C3%A9%20M%C3%BCnster' => ['Café Münster'],
            'abc-_.~123' => ['abc-_.~123'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::encodeUrl(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
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
