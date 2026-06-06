<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToFlatCaseTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class ToFlatCaseTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToFlatCaseTransformer();

        $tests = [
            'flatcaseexample' => 'Flat case example',
            'flatcaseexample2' => 'flatCaseExample2',
            'flatcaseexample3' => 'flat_case_example_3',
            'flatcaseexample4' => 'Flat_Case-Example 4',
            'flatcase' => 'FlatCase',
            'f' => 'F',
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
            'flatcaseexample' => ['Flat case example'],
            'flatcaseexample2' => ['flatCaseExample2'],
            'flatcaseexample3' => ['flat_case_example_3'],
            'flatcaseexample4' => ['Flat_Case-Example 4'],
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
