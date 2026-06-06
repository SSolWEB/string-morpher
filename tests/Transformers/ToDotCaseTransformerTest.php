<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToDotCaseTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class ToDotCaseTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToDotCaseTransformer();

        $tests = [
            'dot.case.example' => 'Dot case example',
            'dot.case.example2' => 'dotCaseExample2',
            'dot.case.example.3' => 'dot_case_example_3',
            'dot.case.example.4' => 'Dot_Case-Example 4',
            'dot.case' => 'DotCase',
            'd' => 'D',
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
            'dot.case.example' => ['Dot case example'],
            'dot.case.example2' => ['dotCaseExample2'],
            'dot.case.example.3' => ['dot_case_example_3'],
            'dot.case.example.4' => ['Dot_Case-Example 4'],
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
}
