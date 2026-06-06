<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for removing substrings from a string.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class RemoveTransformer implements StringTransformerInterface
{
    /**
     * Remove all occurrences of a string.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Arguments: [0] => array|string $needle, [1] => bool $caseSensitive.
     * @return string The string with removals.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $needle = $args[0];
        $caseSensitive = $args[1] ?? true;

        return $caseSensitive
            ? str_replace($needle, '', $input)
            : str_ireplace($needle, '', $input);
    }
}
