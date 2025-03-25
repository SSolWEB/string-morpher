<?php

namespace SSolWEB\StringMorpher;

use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

/**
 * @method static StringMorpherInstance capitalize(string $input)
 * @method static StringMorpherInstance fromBase64(string $input)
 * @method static StringMorpherInstance limit(int $length, string $end = null)
 * @method static StringMorpherInstance onlyAlpha(string $input)
 * @method static StringMorpherInstance onlyNumbers(string $input)
 * @method static StringMorpherInstance replace(array|string $needle, array|string $replace, bool $caseSensitive = true)
 * @method static StringMorpherInstance replaceRegex(array|string $needleRegex, array|string $replace)
 * @method static StringMorpherInstance reverse(string $needle)
 * @method static StringMorpherInstance sub(string $input, int $offset, int $length = null)
 * @method static StringMorpherInstance toBase64(string $input)
 * @method static StringMorpherInstance toLower(string $input)
 * @method static StringMorpherInstance toUpper(string $input)
 * @method static StringMorpherInstance toUpperFirst(string $input)
 * @method static StringMorpherInstance trim(string $input, string $characters = " \n\r\t\v\0")
 * @method static StringMorpherInstance ltrim(string $input, string $characters = " \n\r\t\v\0")
 * @method static StringMorpherInstance rtrim(string $input, string $characters = " \n\r\t\v\0")
 * @method static StringMorpherInstance withoutSpaces(string $input)
 * @method static StringMorpherInstance maskBrCep(string $input)
 * @method static StringMorpherInstance maskBrCpf(string $input)
 * @method static StringMorpherInstance maskBrCnpj(string $input)
 * @method static StringMorpherInstance maskBrPhone(string $input)
 * @method static StringMorpherInstance maskBrReal(string $input)
 */
class StringMorpher
{
    /** {@inheritDoc} */
    private function __construct()
    {
    }

    /**
     * Creates an instance without morphing the input.
     * @param string $input The string to be morphed.
     * @return StringMorpherInstance
     */
    public static function make(string $input)
    {
        return new StringMorpherInstance($input);
    }

    /**
     * {@inheritDoc}
     * @param string $method The method to be called.
     * @param array $args The arguments to be passed to the method.
     * @return StringMorpherInstance
     */
    public static function __callStatic(string $method, array $args)
    {
        $string = array_shift($args);

        return static::make($string)->$method(...$args);
    }
}
