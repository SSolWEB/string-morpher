<?php

namespace SSolWEB\StringMorpher\Instances;

use JsonSerializable;
use Stringable;

/**
 * @method StringMorpherInstance capitalize()
 * @method StringMorpherInstance fromBase64()
 * @method StringMorpherInstance limit(int $length, string|null $end = null)
 * @method StringMorpherInstance normalize()
 * @method StringMorpherInstance onlyAlpha()
 * @method StringMorpherInstance onlyNumbers()
 * @method StringMorpherInstance padL(int $length, string $padChar = ' ')
 * @method StringMorpherInstance padR(int $length, string $padChar = ' ')
 * @method StringMorpherInstance replace(array|string $needle, array|string $replace, bool $caseSensitive = true)
 * @method StringMorpherInstance replaceRegex(array|string $needleRegex, array|string $replace)
 * @method StringMorpherInstance reverse()
 * @method StringMorpherInstance sub(int $offset, int|null $length = null)
 * @method StringMorpherInstance toBase64()
 * @method StringMorpherInstance toLower()
 * @method StringMorpherInstance toUpper()
 * @method StringMorpherInstance toUpperFirst()
 * @method StringMorpherInstance trim(string $characters = " \n\r\t\v\0")
 * @method StringMorpherInstance ltrim(string $characters = " \n\r\t\v\0")
 * @method StringMorpherInstance rtrim(string $characters = " \n\r\t\v\0")
 * @method StringMorpherInstance withoutSpaces()
 * @method StringMorpherInstance toCamelCase()
 * @method StringMorpherInstance toPascalCase()
 * @method StringMorpherInstance toSnakeCase()
 * @method StringMorpherInstance toKebabCase()
 * @method StringMorpherInstance toUpperSnakeCase()
 * @method StringMorpherInstance maskBrCep()
 * @method StringMorpherInstance maskBrCpf()
 * @method StringMorpherInstance maskBrCnpj()
 * @method StringMorpherInstance maskBrPhone()
 * @method StringMorpherInstance maskBrReal()
 */
class StringMorpherInstance implements Stringable, JsonSerializable
{
    use \SSolWEB\StringMorpher\Maskers\BrazilianMasker;
    use \SSolWEB\StringMorpher\Manipulators\Cases;
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
