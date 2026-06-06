<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToSnakeCaseTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class ToSnakeCaseTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToSnakeCaseTransformer();

        $tests = [
            'snake_case_example' => 'Snake case example',
            'snake_case_example2' => 'snakeCaseExample2',
            'snake_case_example_3' => 'snake-case-example-3',
            'snake_case_example_4' => 'Snake_Case-Example 4',
            'snake_case' => 'SnakeCase',
            's' => 'S',
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
            'snake_case_example' => ['Snake case example'],
            'snake_case_example2' => ['snakeCaseExample2'],
            'snake_case_example_3' => ['snake-case-example-3'],
            'snake_case_example_4' => ['Snake_Case-Example 4'],
            'snake_case' => ['SnakeCase'],
            's' => ['S'],
            '' => [''],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::toSnakeCase(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
