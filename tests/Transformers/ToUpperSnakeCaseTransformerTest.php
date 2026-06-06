<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToUpperSnakeCaseTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class ToUpperSnakeCaseTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToUpperSnakeCaseTransformer();

        $tests = [
            'UPPER_SNAKE_CASE_EXAMPLE' => 'Upper snake case example',
            'UPPER_SNAKE_CASE_EXAMPLE2' => 'upperSnakeCaseExample2',
            'UPPER_SNAKE_CASE_EXAMPLE_3' => 'upper-snake-case-example-3',
            'UPPER_SNAKE_CASE_EXAMPLE_4' => 'Upper_Snake-Case_Example_4',
            'UPPER_SNAKE_CASE' => 'UpperSnakeCase',
            'U' => 'U',
            '' => '',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }

    public function testFacade()
    {
        $tests = [
            'UPPER_SNAKE_CASE_EXAMPLE' => ['Upper snake case example'],
            'UPPER_SNAKE_CASE_EXAMPLE2' => ['upperSnakeCaseExample2'],
            'UPPER_SNAKE_CASE_EXAMPLE_3' => ['upper-snake-case-example-3'],
            'UPPER_SNAKE_CASE_EXAMPLE_4' => ['Upper_Snake-Case_Example_4'],
            'UPPER_SNAKE_CASE' => ['UpperSnakeCase'],
            'U' => ['U'],
            '' => [''],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::toUpperSnakeCase(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
