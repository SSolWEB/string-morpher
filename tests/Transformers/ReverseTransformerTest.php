<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\ReverseTransformer;

class ReverseTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ReverseTransformer();

        $tests = [
            'The quick brown fox jumps' => 'spmuj xof nworb kciuq ehT',
            'The qu1ck br0wn fox jumps ov3r the l4zy dog' =>
                'god yz4l eht r3vo spmuj xof nw0rb kc1uq ehT',
            'zyxwvutsrqponmlkjihgfedcba' => 'abcdefghijklmnopqrstuvwxyz',
            'abcde' => 'edcba',
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
