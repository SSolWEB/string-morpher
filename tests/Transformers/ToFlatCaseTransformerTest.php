<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToFlatCaseTransformer;

class ToFlatCaseTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToFlatCaseTransformer();

        $tests = [
            'flatcaseexample' => 'Flat case example',
            'flatcaseexample' => 'flatCaseExample',
            'flatcaseexample' => 'flat_case_example',
            'flatcaseexample' => 'Flat_Case-Example',
            'flatcase' => 'FlatCase',
            'f' => 'F',
            '' => '',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
