<?php

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Removes all HTML and PHP tags from a string.
 * Optionally allows certain tags (as in PHP's strip_tags).
 */
class StripTagsTransformer implements StringTransformerInterface
{
    /**
     * @param string $input The string to sanitize.
     * @param mixed ...$args Arguments: [0] => string $allowedTags (optional).
     * @return string The sanitized string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $allowedTags = $args[0] ?? null;
        return strip_tags($input, $allowedTags);
    }
}
