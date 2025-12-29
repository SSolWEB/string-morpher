<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for replacing substrings in a string.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ReplaceTransformer implements StringTransformerInterface
{
    /**
     * Replace all occurrences of a string.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Arguments: [0] => array|string $needle, [1] => array|string $replace,
     *                       [2] => bool $caseSensitive.
     * @return string The string with replacements.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $needle = $args[0];
        $replace = $args[1];
        $caseSensitive = $args[2] ?? true;

        return $caseSensitive
            ? str_replace($needle, $replace, $input)
            : str_ireplace($needle, $replace, $input);
    }
}
