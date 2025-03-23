<?php

namespace SSolWEB\StringMorpher\Tests\Maskers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\StringMorpher as SM;

/**
 * Test class behavior as a string
 */
class StringBehaviorTest extends TestCase
{
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
