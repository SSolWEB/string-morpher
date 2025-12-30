<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\NormalizeTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

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

    public function testFacade()
    {
        $tests = [
            '0123456789ABCDEFGHIJKLMNOPQ' => ["†¤¶§!\"#$%&'()*+,-./0123456789:;=>?@ABCDEFGHIJKLMNOPQ"],
            'RSTUVWXYZabcdefghijklmnopqrstuvwxyz' => ['RSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~'],
            'CueaaaaceeeiiiooouuyPaiounN' => ['ÇüéâäàåçêëèïîìæÆôöòûùÿ¢£¥PƒáíóúñÑ¿¬½¼¡«»¦ßµ±°•·²€„…†'],
            'SsYAAAAAAEEEEIIIIOOOOOUUUU' => ["‡ˆ‰Š‹Œ''\"\"–—˜™š›œŸ¨©®¯³´¸¹¾ÀÁÂÃÄÅÈÉÊËÌÍÎÏÐÒÓÔÕÖ×ØÙÚÛÜ"],
            'Yaoouy ' => ["ÝÞãðõ÷øüýþ\" "],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::normalize(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
