<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Transformers\EscapeHtmlTransformer;

class EscapeHtmlTransformerTest extends TestCase
{
    public static function paramProvider(): array
    {
        return [
            ['&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;', '<script>alert("XSS")</script>'],
            ['5 &lt; 7 &amp; &quot;hello&quot;', '5 < 7 & "hello"'],
            ['Click &quot;here&quot; &amp; learn', 'Click "here" & learn'],
            ['', ''],
            ['plain text', 'plain text'],
            ['Caf&amp;eacute;', 'Caf&eacute;'],
            ['It&apos;s a test', "It's a test"],
        ];
    }

    public function testTransform()
    {
        $transformer = new EscapeHtmlTransformer();

        foreach ($this->paramProvider() as $args) {
            $expected = array_shift($args);
            $result = $transformer->transform(...$args);
            $this->assertEquals($expected, $result);
        }
    }

    public function testFacade()
    {
        foreach ($this->paramProvider() as $args) {
            $expected = array_shift($args);
            $result = SM::escapeHtml(...$args);
            $this->assertEquals($expected, $result);
            $this->assertInstanceOf(StringMorpherInstance::class, $result);
        }
    }

    public function testFacadeAcceptsNull()
    {
        $result = SM::escapeHtml(null);
        $this->assertEquals('', $result);
        $this->assertInstanceOf(StringMorpherInstance::class, $result);
    }

    public function testFluent()
    {
        $actual = SM::make('  <b>hello</b>  ')
            ->trim()
            ->escapeHtml();

        $this->assertEquals('&lt;b&gt;hello&lt;/b&gt;', $actual);
        $this->assertInstanceOf(StringMorpherInstance::class, $actual);
    }

    public function testEscapesAttributeQuotesForAttributeContext()
    {
        $title = 'Click "here" & learn';
        $escaped = SM::escapeHtml($title);
        $this->assertEquals('Click &quot;here&quot; &amp; learn', (string)$escaped);
    }

    public function testHandlesUtf8WithoutCorrupting()
    {
        $input = 'Café Münster <em>x</em>';
        $expected = 'Café Münster &lt;em&gt;x&lt;/em&gt;';
        $this->assertEquals($expected, (string)SM::escapeHtml($input));
    }
}
