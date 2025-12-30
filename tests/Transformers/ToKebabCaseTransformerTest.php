<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToKebabCaseTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class ToKebabCaseTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToKebabCaseTransformer();

        $tests = [
            'kebab-case-example' => 'Kebab case example',
            'kebab-case-example' => 'kebabCaseExample',
            'kebab-case-example' => 'kebab_case_example',
            'kebab-case-example' => 'Kebab_Case-Example',
            'kebab-case' => 'KebabCase',
            'k' => 'K',
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
}
