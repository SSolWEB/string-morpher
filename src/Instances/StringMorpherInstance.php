<?php

namespace SSolWEB\StringMorpher\Instances;

use JsonSerializable;
use Stringable;

class StringMorpherInstance implements Stringable, JsonSerializable
{
    use \SSolWEB\StringMorpher\Maskers\BrazilianMasker;
    use \SSolWEB\StringMorpher\Manipulators\Manipulator;

    private string $string;

    /**
     * Creates a new instance of StringMorpherInstance.
     * @param string $string The string to be morphed.
     */
    public function __construct(string $string)
    {
        $this->string = $string;
    }

    /** {@inheritDoc} */
    public function __toString(): string
    {
        return $this->string;
    }

    /**
     * return the actual string.
     * @return string
     */
    public function getString(): string
    {
        return $this->string;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): mixed
    {
        return $this->string;
    }
}
