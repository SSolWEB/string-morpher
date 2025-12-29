<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToUpperSnakeCaseTransformer;

class ToUpperSnakeCaseTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToUpperSnakeCaseTransformer();

        $tests = [
            'UPPER_SNAKE_CASE_EXAMPLE' => 'Upper snake case example',
            'UPPER_SNAKE_CASE_EXAMPLE' => 'upperSnakeCaseExample',
            'UPPER_SNAKE_CASE_EXAMPLE' => 'upper-snake-case-example',
            'UPPER_SNAKE_CASE_EXAMPLE' => 'Upper_Snake-Case_Example',
            'UPPER_SNAKE_CASE' => 'UpperSnakeCase',
            'U' => 'U',
            '' => '',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
