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
            'dot.case.example' => 'dotCaseExample',
            'dot.case.example' => 'dot_case_example',
            'dot.case.example' => 'Dot_Case-Example',
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
}
