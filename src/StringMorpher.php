<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher;

use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

/**
 * @method static StringMorpherInstance append(string $input, string $append)
 * @method static StringMorpherInstance capitalize(string $input)
 * @method static StringMorpherInstance fromBase64(string $input)
 * @method static StringMorpherInstance limit(string $input, int $length, string $end = null)
 * @method static StringMorpherInstance normalize(string $input)
 * @method static StringMorpherInstance onlyAlpha(string $input)
 * @method static StringMorpherInstance onlyNumbers(string $input)
 * @method static StringMorpherInstance padL(string $input, int $length, string $padChar = ' ')
 * @method static StringMorpherInstance padR(string $input, int $length, string $padChar = ' ')
 * @method static StringMorpherInstance replace(string $input, array|string $needle, array|string $replace, bool $cs)
 * @method static StringMorpherInstance replaceRegex(string $input, array|string $needleRegex, array|string $replace)
 * @method static StringMorpherInstance reverse(string $input)
 * @method static StringMorpherInstance sub(string $input, int $offset, int|null $length = null)
 * @method static StringMorpherInstance toBase64(string $input)
 * @method static StringMorpherInstance toLower(string $input)
 * @method static StringMorpherInstance toUpper(string $input)
 * @method static StringMorpherInstance toUpperFirst(string $input)
 * @method static StringMorpherInstance trim(string $input, string $characters = " \n\r\t\v\0")
 * @method static StringMorpherInstance ltrim(string $input, string $characters = " \n\r\t\v\0")
 * @method static StringMorpherInstance rtrim(string $input, string $characters = " \n\r\t\v\0")
 * @method static StringMorpherInstance withoutSpaces(string $input)
 * @method static StringMorpherInstance prepend(string $input, string|null $prefix)
 * @method static StringMorpherInstance toCamelCase(string $input)
 * @method static StringMorpherInstance toPascalCase(string $input)
 * @method static StringMorpherInstance toSnakeCase(string $input)
 * @method static StringMorpherInstance toKebabCase(string $input)
 * @method static StringMorpherInstance toUpperSnakeCase(string $input)
 * @method static StringMorpherInstance toTrainCase(string $input)
 * @method static StringMorpherInstance toDotCase(string $input)
 * @method static StringMorpherInstance toFlatCase(string $input)
 * @method static StringMorpherInstance mask(string $input, string $maskPattern, array $customMap = null)
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
     * @param string|integer|float|null $input The string to be morphed.
     * @return StringMorpherInstance
     */
    public static function make(string|int|float|null $input): StringMorpherInstance
    {
        return new StringMorpherInstance((string)($input ?? ''));
    }

    /**
     * {@inheritDoc}
     * @param string $method The method to be called.
     * @param array $args The arguments to be passed to the method.
     * @return StringMorpherInstance
     */
    public static function __callStatic(string $method, array $args): StringMorpherInstance
    {
        $string = array_shift($args);

        return static::make($string)->$method(...$args);
    }
}
