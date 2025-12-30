<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\WithoutSpacesTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class WithoutSpacesTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new WithoutSpacesTransformer();

        $tests = [
            'Thequickbrownfoxjumpsoverthelazydog' => 'The quick brown fox jumps over the lazy dog',
            'ab1234567890' => 'ab 123 456 789 0',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
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
