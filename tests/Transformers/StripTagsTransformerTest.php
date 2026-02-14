<?php

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\Transformers\StripTagsTransformer;

class StripTagsTransformerTest extends TestCase
{
    public static function paramProvider()
    {
        return [
            ['ParagraphBold', '<p>Paragraph</p><b>Bold</b>', ''],
            ['ParagraphBoldExample', '<p>Paragraph</p><b>Bold</b><p>Example</p>'],
            ['Welcomehere', '<p>Welcome</p><a href="#">here</a>'],
            ['<p>Welcome</p><a href="#">here</a>', '<p>Welcome</p><a href="#">here</a>', ['<a>', '<p>']],
            ['here', '<a>here</a>'],
            ['<a>here</a>', '<a>here</a>', '<a>'],
            ['Just text', 'Just text'],
            ['Bold', '<b>Bold</b>'],
            ['<b>Bold</b>', '<b>Bold</b>', '<b>'],
            ['', ''],
        ];
    }

    public function testTransform()
    {
        foreach ($this->paramProvider() as $args) {
            $expected = array_shift($args);
            $transformer = new StripTagsTransformer();
            $result = $transformer->transform(...$args);
            $this->assertEquals($expected, $result);
        }
    }

    public function testFacade()
    {
        foreach ($this->paramProvider() as $args) {
            $expected = array_shift($args);
            $result = SM::stripTags(...$args);
            $this->assertEquals($expected, $result);
            $this->assertInstanceOf(StringMorpherInstance::class, $result);
        }
    }

    public function testFacadeAcceptsNull()
    {
        $result = SM::stripTags(null);
        $this->assertEquals('', $result);
        $this->assertInstanceOf(StringMorpherInstance::class, $result);
    }
}
