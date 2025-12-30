<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting strings to uppercase.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ToUpperTransformer implements StringTransformerInterface
{
    /**
     * Convert string to uppercase.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The uppercase string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        return mb_strtoupper($input, 'UTF-8');
    }
}
