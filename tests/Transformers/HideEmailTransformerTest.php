<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Tests\Transformers;

use PHPUnit\Framework\TestCase;
use SSolWEB\StringMorpher\Transformers\HideEmailTransformer;
use SSolWEB\StringMorpher\StringMorpher as SM;
use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

class HideEmailTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new HideEmailTransformer();

        $tests = [
            'jo********@ex*****.com' => 'joao.silva@example.com',
            'jo***@gm***.com'        => 'joana@gmail.com',
            'al***@co*****.co.uk'    => 'alice@contoso.co.uk',
        ];

        foreach ($tests as $expected => $input) {
            $this->assertEquals($expected, $transformer->transform($input));
        }
    }

    public function testShortLocalOrDomainKeepsOneMaskStar()
    {
        $transformer = new HideEmailTransformer();

        $this->assertEquals('a*@x*.io', $transformer->transform('a@x.io'));
        $this->assertEquals('bo*@x*.io', $transformer->transform('bo@x.io'));
        $this->assertEquals('al***@x*.io', $transformer->transform('alice@x.io'));
    }

    public function testInvalidEmailIsReturnedUnchanged()
    {
        $transformer = new HideEmailTransformer();

        $this->assertEquals('not-an-email', $transformer->transform('not-an-email'));
        $this->assertEquals('', $transformer->transform(''));
        $this->assertEquals('@no-local.com', $transformer->transform('@no-local.com'));
    }

    public function testFacade()
    {
        $tests = [
            'jo********@ex*****.com' => ['joao.silva@example.com'],
            'al***@co*****.co.uk'    => ['alice@contoso.co.uk'],
            'not-an-email'           => ['not-an-email'],
        ];

        foreach ($tests as $expected => $params) {
            $actual = SM::hideEmail(...$params);
            $this->assertEquals($expected, $actual);
            $this->assertInstanceOf(StringMorpherInstance::class, $actual);
        }
    }
}
