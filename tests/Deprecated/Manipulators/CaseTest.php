<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Manipulators;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class CaseTest extends TestCase
{
    public function testToCamelCase()
    {
        $tests = [
            'camelCaseExample' => ['Camel case example'],
            'camelCaseExample' => ['camel_case_example'],
            'camelCaseExample' => ['camel-case-example'],
            'camelCaseExample' => ['Camel_Case-Example'],
            'camelCase' => ['CamelCase'],
            'c' => ['C'],
            '' => [''],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::toCamelCase(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testToPascalCase()
    {
        $tests = [
            'PascalCaseExample' => ['Pascal case example'],
            'PascalCaseExample' => ['pascal_case_example'],
            'PascalCaseExample' => ['pascal-case-example'],
            'PascalCaseExample' => ['Pascal_Case-Example'],
            'PascalCase' => ['PascalCase'],
            'P' => ['P'],
            '' => [''],
        ];
        foreach ($tests as $expected => $params) {
            SM::make('test')->toPascalCase();
            $actual = SM::toPascalCase(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testToSnakeCase()
    {
        $tests = [
            'snake_case_example' => ['Snake case example'],
            'snake_case_example' => ['snakeCaseExample'],
            'snake_case_example' => ['snake-case-example'],
            'snake_case_example' => ['Snake_Case-Example'],
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

    public function testToKebabCase()
    {
        $tests = [
            'kebab-case-example' => ['Kebab case example'],
            'kebab-case-example' => ['kebabCaseExample'],
            'kebab-case-example' => ['kebab_case_example'],
            'kebab-case-example' => ['Kebab_Case-Example'],
            'kebab-case' => ['KebabCase'],
            'k' => ['K'],
            '' => [''],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::toKebabCase(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testToUpperSnakeCase()
    {
        $tests = [
            'UPPER_SNAKE_CASE_EXAMPLE' => ['Upper snake case example'],
            'UPPER_SNAKE_CASE_EXAMPLE' => ['upperSnakeCaseExample'],
            'UPPER_SNAKE_CASE_EXAMPLE' => ['upper-snake-case-example'],
            'UPPER_SNAKE_CASE_EXAMPLE' => ['Upper_Snake-Case_Example'],
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

    public function testToTrainCase()
    {
        $tests = [
            'Train-Case-Example' => ['Train case example'],
            'Train-Case-Example' => ['trainCaseExample'],
            'Train-Case-Example' => ['train_case_example'],
            'Train-Case-Example' => ['Train_Case-Example'],
            'Train-Case' => ['TrainCase'],
            'T' => ['T'],
            '' => [''],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::toTrainCase(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testToDotCase()
    {
        $tests = [
            'dot.case.example' => ['Dot case example'],
            'dot.case.example' => ['dotCaseExample'],
            'dot.case.example' => ['dot_case_example'],
            'dot.case.example' => ['Dot_Case-Example'],
            'dot.case' => ['DotCase'],
            'd' => ['D'],
            '' => [''],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::toDotCase(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }

    public function testToFlatCase()
    {
        $tests = [
            'flatcaseexample' => ['Flat case example'],
            'flatcaseexample' => ['flatCaseExample'],
            'flatcaseexample' => ['flat_case_example'],
            'flatcaseexample' => ['Flat_Case-Example'],
            'flatcase' => ['FlatCase'],
            'f' => ['F'],
            '' => [''],
        ];
        foreach ($tests as $expected => $params) {
            $actual = SM::toFlatCase(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
