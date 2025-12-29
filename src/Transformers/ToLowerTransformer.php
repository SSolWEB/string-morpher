<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting strings to lowercase.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ToLowerTransformer implements StringTransformerInterface
{
    /**
     * Convert string to lowercase.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The lowercase string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        return mb_strtolower($input, 'UTF-8');
    }
}
