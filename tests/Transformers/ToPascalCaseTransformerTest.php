<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToPascalCaseTransformer;

class ToPascalCaseTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToPascalCaseTransformer();

        $tests = [
            'PascalCaseExample' => 'Pascal case example',
            'PascalCaseExample' => 'pascal_case_example',
            'PascalCaseExample' => 'pascal-case-example',
            'PascalCaseExample' => 'Pascal_Case-Example',
            'PascalCase' => 'PascalCase',
            'P' => 'P',
            '' => '',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
