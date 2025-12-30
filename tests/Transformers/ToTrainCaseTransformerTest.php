<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ToTrainCaseTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class ToTrainCaseTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ToTrainCaseTransformer();

        $tests = [
            'Train-Case-Example' => 'Train case example',
            'Train-Case-Example' => 'trainCaseExample',
            'Train-Case-Example' => 'train_case_example',
            'Train-Case-Example' => 'Train_Case-Example',
            'Train-Case' => 'TrainCase',
            'T' => 'T',
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
}
