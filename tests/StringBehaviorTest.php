<?php

namespace SSolWEB\StringMorpher\Tests\Maskers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;
use SSolWEB\StringMorpher\StringMorpher as SM;

/**
 * Test class behavior as a string
 */
class StringBehaviorTest extends TestCase
{
    public function testAcceptNull()
    {
        $instance = SM::make(null);
        $this->assertEquals('', $instance->getString());
        $this->assertInstanceOf(StringMorpherInstance::class, $instance);
    }

    public function testAllMethodsAcceptNull()
    {
        // List of methods and params to call
        $methods = [
            'capitalize' => [null],
            'fromBase64' => [null],
            'limit' => [null, 10, '...'],
            'normalize' => [null],
            'onlyAlpha' => [null],
            'onlyNumbers' => [null],
            'padL' => [null, 5, '1'],
            'padR' => [null, 5, '1'],
            'replace' => [null, 'needle', 'replace'],
            'replaceRegex' => [null, '/needle/', 'replace'],
            'reverse' => [null],
            'sub' => [null, 1, 5],
            'toBase64' => [null],
            'toLower' => [null],
            'toUpper' => [null],
            'toUpperFirst' => [null],
            'trim' => [null],
            'ltrim' => [null],
            'rtrim' => [null],
            'withoutSpaces' => [null],
            'maskBrCep' => [null],
            'maskBrCpf' => [null],
            'maskBrCnpj' => [null],
            'maskBrPhone' => [null],
            'maskBrReal' => [null],
        ];
        // Call each method with appropriate arguments
        foreach ($methods as $method => $args) {
            $result = SM::$method(...$args);
            $this->assertInstanceOf(StringMorpherInstance::class, $result);
        }
    }

    public function testMakeMethod()
    {
        $content = "Hello, World!";
        $instance = SM::make($content);
        $this->assertEquals($content, $instance);
        $this->assertInstanceOf(StringMorpherInstance::class, $instance);
    }

    public function testToStringMethod()
    {
        $content = "Hello, World!";
        $instance = SM::make($content);
        ob_start();
        echo $instance;
        $output = ob_get_clean();
        $this->assertEquals($content, $output);
    }

    public function testJsonSerialization()
    {
        $content = "Hello, JSON!";
        $instance = SM::make($content);
        $jsonDataInstance = json_encode(['data' => $instance]);
        $this->assertJsonStringEqualsJsonString(
            json_encode(['data' => $content]),
            $jsonDataInstance
        );
    }
}
