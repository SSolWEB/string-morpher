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

    /**
     * {@inheritDoc}
     * @param string $method The method to be called.
     * @param array $args The arguments to be passed to the method.
     * @return StringMorpherInstance
     */
    public function __call(string $method, array $args)
    {
        if (method_exists($this, $method)) {
            array_unshift($args, $this->string);
            $this->string = $this->$method(...$args);
            return $this;
        }

        throw new \BadMethodCallException("Method {$method} does not exist");
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
