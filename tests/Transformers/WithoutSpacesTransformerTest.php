<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\WithoutSpacesTransformer;

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
}
