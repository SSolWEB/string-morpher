<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting first character to uppercase.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ToUpperFirstTransformer implements StringTransformerInterface
{
    /**
     * Convert first character to uppercase.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The string with first character in uppercase.
     */
    public function transform(string $input, mixed ...$args): string
    {
        return ucfirst($input);
    }
}
