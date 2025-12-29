<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToCamelCaseTransformer;

class ToCamelCaseTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToCamelCaseTransformer();

        $tests = [
            'camelCaseExample' => 'Camel case example',
            'camelCaseExample' => 'camel_case_example',
            'camelCaseExample' => 'camel-case-example',
            'camelCaseExample' => 'Camel_Case-Example',
            'camelCase' => 'CamelCase',
            'c' => 'C',
            '' => '',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
