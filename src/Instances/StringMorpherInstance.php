<?php

namespace SSolWEB\StringMorpher\Instances;

use JsonSerializable;
use Stringable;

class StringMorpherInstance implements Stringable, JsonSerializable
{
    use \SSolWEB\StringMorpher\Maskers\BrazilianMasker;
    use \SSolWEB\StringMorpher\Manipulators\Manipulator;

    private string|null $string;

    public function __construct(string|null $string)
    {
        $this->string = $string;
    }

    public function __toString(): string
    {
        return $this->string ?? '';
    }

    public function getString(): string
    {
        return $this->string;
    }

    public function jsonSerialize(): mixed
    {
        return $this->string;
    }
}
