<?php

namespace SSolWEB\Instances;

use Stringable;

class StringMorpherInstance implements Stringable
{
    use \SSolWEB\Maskers\BrazilianMasker;
    use \SSolWEB\Manipulators\Manipulator;

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
}
