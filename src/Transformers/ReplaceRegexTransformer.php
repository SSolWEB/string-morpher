<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for replacing substrings using regex patterns.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ReplaceRegexTransformer implements StringTransformerInterface
{
    /**
     * Replace all occurrences using a regex pattern.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Arguments: [0] => array|string $needleRegex, [1] => array|string $replace.
     * @return string The string with regex replacements.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $needleRegex = $args[0];
        $replace = $args[1];
        return preg_replace($needleRegex, $replace, $input);
    }
}
