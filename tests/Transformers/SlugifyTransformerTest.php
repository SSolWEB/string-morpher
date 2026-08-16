<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Transformers\SlugifyTransformer;

class SlugifyTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new SlugifyTransformer();

        $tests = [
            ['ola-mundo-como-vai', 'Olá mundo, como vai?'],
            ['this-is-a-test', 'This Is A Test'],
            ['hello-world', 'hello_world'],
            ['hello-world', 'hello---world'],
            ['123-test', '123 test!'],
            ['slugify-me','  slugify me  '],
            ['a-b-c', 'a b c'],
        ];

        foreach ($tests as $test) {
            $expected = array_shift($test);
            $input = array_shift($test);
            $actual = $transformer->transform($input, ...$test);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $tests = [
            ['ola-mundo-como-vai', ['Olá mundo, como vai?']],
            ['this-is-a-test', ['This Is A Test']],
            ['hello-world', ['hello_world']],
            ['hello-world', ['hello---world']],
            ['123-test', ['123 test!']],
            ['slugify-me', ['  slugify me  ']],
            ['a-b-c', ['a b c']],
        ];

        foreach ($tests as [$expected, $params]) {
            $actual = SM::slugify(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testFacadeAcceptsNull()
    {
        $result = SM::slugify(null);
        $this->assertEquals('', $result);
        $this->assertInstanceOf(StringMorpherInstance::class, $result);
        // other example
        $result = SM::slugify(null, null);
        $this->assertEquals('', $result);
        $this->assertInstanceOf(StringMorpherInstance::class, $result);
    }

    private SlugifyTransformer $transformer;

    protected function setUp(): void
    {
        $this->transformer = new SlugifyTransformer();
    }

    public function testTransformWithCustomSeparator(): void
    {
        $this->assertEquals('ola_mundo_como_vai', SM::slugify('Olá mundo, como vai?', '_'));
        $this->assertEquals('this_is_a_test', SM::slugify('This Is A Test', '_'));
        $this->assertEquals('hello_world', SM::slugify('hello-world', '_'));
    }

    public function testTransformWithEmptySeparator(): void
    {
        $this->assertEquals('olamundocomovai', SM::slugify('Olá mundo, como vai?', ''));
        $this->assertEquals('thisisatest', SM::slugify('This Is A Test', ''));
    }
}
