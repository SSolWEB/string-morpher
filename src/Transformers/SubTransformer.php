<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for extracting a substring from a string.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class SubTransformer implements StringTransformerInterface
{
    /**
     * Extract a substring from the input string.
     *
     * @param string $input The string to transform.
     * @param array $args Arguments: [0] => int $offset, [1] => int|null $length.
     * @return string The substring.
     */
    public function transform(string $input, array $args = []): string
    {
        $offset = $args[0] ?? 0;
        $length = $args[1] ?? null;
        return substr($input, $offset, $length);
    }
}
