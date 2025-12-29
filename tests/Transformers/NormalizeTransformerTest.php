<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\NormalizeTransformer;

class NormalizeTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new NormalizeTransformer();

        $tests = [
            '0123456789ABCDEFGHIJKLMNOPQ' => "†¤¶§!\"#$%&'()*+,-./0123456789:;=>?@ABCDEFGHIJKLMNOPQ",
            'RSTUVWXYZabcdefghijklmnopqrstuvwxyz' => 'RSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~',
            'CueaaaaceeeiiiooouuyPaiounN' => 'ÇüéâäàåçêëèïîìæÆôöòûùÿ¢£¥PƒáíóúñÑ¿¬½¼¡«»¦ßµ±°•·²€„…†',
            'SsYAAAAAAEEEEIIIIOOOOOUUUU' => "‡ˆ‰Š‹Œ''\"\"–—˜™š›œŸ¨©®¯³´¸¹¾ÀÁÂÃÄÅÈÉÊËÌÍÎÏÐÒÓÔÕÖ×ØÙÚÛÜ",
            'Yaoouy ' => "ÝÞãðõ÷øüýþ\" ",
        ];

        foreach ($tests as $expected => $input) {
            $actual = $transformer->transform($input);
            $this->assertEquals($expected, $actual);
        }
    }
}
