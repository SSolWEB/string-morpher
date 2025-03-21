<?php

namespace SSolWEB;

use SSolWEB\Instances\StringMorpherInstance;

/**
 * @method static StringMorpherInstance onlyNumbers(string $input)
 * @method static StringMorpherInstance onlyAlpha(string $input)
 * @method static StringMorpherInstance withoutSpaces(string $input)
 * @method static StringMorpherInstance capitalize(string $input)
 * @method static StringMorpherInstance maskCPF(string $input)
 * @method static StringMorpherInstance maskPhone(string $input)
 */
class StringMorpher
{
    public static function __callStatic($method, $args)
    {
        $instance = new StringMorpherInstance($args[0] ?? null);

        return $instance->$method();
    }
}
