<?php

namespace SSolWEB\StringMorpher;

use SSolWEB\StringMorpher\Instances\StringMorpherInstance;

/**
 * @method static StringMorpherInstance onlyNumbers(string $input)
 * @method static StringMorpherInstance onlyAlpha(string $input)
 * @method static StringMorpherInstance withoutSpaces(string $input)
 * @method static StringMorpherInstance capitalize(string $input)
 * @method static StringMorpherInstance maskBrCep(string $input)
 * @method static StringMorpherInstance maskBrCpf(string $input)
 * @method static StringMorpherInstance maskBrCnpj(string $input)
 * @method static StringMorpherInstance maskBrPhone(string $input)
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
        $instance = new StringMorpherInstance($args[0] ?? null);

        return $instance->$method();
    }
}
